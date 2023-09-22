<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\AboutManagementRequest;
use App\Models\About;
use Illuminate\Http\Request;

class AboutManagementController extends Controller
{
    public function index()
    {
        $userAbout = About::where('user_id', auth()->id())->firstOrFail();
        return view('admin.sectionManagements.about', compact('userAbout'));
    }

    

    public function save(AboutManagementRequest $request)
    {

        $about = About::where('user_id', auth()->id())->firstOrFail();

        $image = FileHelper::uploadImage($request, $about, [], 500, 625);

        $about->user_id = auth()->id();
        $about->image = $image;
        $about->text_1 = $request->text_1;
        $about->text_2 = $request->text_2;
        $about->text_3 = $request->text_3;
        $about->count_1 = $request->count_1;
        $about->count_text_1 = $request->count_text_1;
        $about->count_2 = $request->count_2;
        $about->count_text_2 = $request->count_text_2;
        $about->count_3 = $request->count_3;
        $about->count_text_3 = $request->count_text_3;
        $about->button_text = $request->button_text;
        $about->button_status = $request->button_status ? 1 : 0;
        $about->extra_text = $request->extra_text;
        $about->save();

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }
}
