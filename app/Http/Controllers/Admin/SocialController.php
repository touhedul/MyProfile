<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SocialDataTable;
use App\Http\Requests;
use App\Http\Requests\SocialCreateRequest;
use App\Http\Requests\SocialUpdateRequest;
use App\Models\Social;
use App\Http\Controllers\AppBaseController;
use App\Models\AdditionalInfo;
use Illuminate\Http\Request;

class SocialController extends AppBaseController
{

    private $icon = 'pe-7s-box1';


    public function index(SocialDataTable $socialDataTable)
    {
        $this->authorize('Social-view');
        $icon = $this->icon;
        $footer = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','footer_text');
        })->get();
        return $socialDataTable->render('admin.socials.index',compact('icon','footer'));
    }


    public function create()
    {
        $this->authorize('Social-create');
        return view('admin.socials.create')->with('icon', $this->icon);
    }


    public function store(SocialCreateRequest $request)
    {
        $this->authorize('Social-create');

        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        Social::create(array_merge($request->all(),['status' => $status]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.socials.index'));
    }


    public function show(Social $social)
    {
        $this->authorize('Social-view');
        checkUserAndAuthId($social);
        return view('admin.socials.show',compact('social'))->with('icon', $this->icon);
    }


    public function edit(Social $social)
    {
        $this->authorize('Social-update');
        checkUserAndAuthId($social);
        return view('admin.socials.edit',compact('social'))->with('icon', $this->icon);
    }


    public function update(Social $social, SocialUpdateRequest $request)
    {
        $this->authorize('Social-update');
        checkUserAndAuthId($social);

        $status = $request->status ?? 0;
        $social->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.socials.index'));
    }


    public function destroy(Social $social)
    {
        $this->authorize('Social-delete');
        checkUserAndAuthId($social);
        //FileHelper::deleteImage($social);
        $social->delete();
    }

    public function saveText(Request $request)
    {
        $this->authorize('Social-update');

        AdditionalInfo::where('user_id',auth()->id())->where('key','footer_text')->update(['value' => $request->footer_text]);
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.socials.index'));
    }
}
