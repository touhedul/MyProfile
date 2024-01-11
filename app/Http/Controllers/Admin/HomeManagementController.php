<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\HomeManagementRequest;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeManagementController extends Controller
{
    public function index()
    {

        $this->authorize('Home-management');
         $userHome = Home::where('user_id', auth()->id())->first();
        $userHome->text_2 = json_decode($userHome->text_2);
        // return $userHome;
        return view('admin.sectionManagements.home', compact('userHome'));
    }


    public function save(HomeManagementRequest $request)
    {
        return $request;
        $home = Home::where('user_id',auth()->id())->firstOrFail();

        $slider1 = $request->slider_1 ? FileHelper::uploadImageByName($request,"slider_1",1500,1000) : $home->slider_1;
        $slider2 = $request->slider_2 ?  FileHelper::uploadImageByName($request,"slider_2",1500,1000) : $home->slider_2;
        $slider3 = $request->slider_3 ?  FileHelper::uploadImageByName($request,"slider_3",1500,1000) : $home->slider_3;
        $file = $request->file ? FileHelper::uploadFile($request) : $home->file;

        $home->user_id = auth()->id();
        $home->slider_1 = $slider1 ?? $home->slider_1;
        $home->slider_2 = $slider2 ?? $home->slider_2;
        $home->slider_3 = $slider3 ?? $home->slider_3;
        $home->slider_1_status = $request->slider_1_status ? 1 : 0;
        $home->slider_2_status = $request->slider_2_status ? 1 : 0;
        $home->slider_3_status = $request->slider_3_status ? 1 : 0;
        $home->text_1 = $request->text_1;
        $home->text_2 = json_encode($request->text_2);
        $home->text_3 = $request->text_3;
        $home->button_text = $request->button_text;
        $home->file = $file;
        $home->button_status = $request->button_status ? 1 : 0;
        $home->save();

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }
}
