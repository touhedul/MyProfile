<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ContactinfoDataTable;
use App\Http\Requests;
use App\Http\Requests\ContactinfoCreateRequest;
use App\Http\Requests\ContactinfoUpdateRequest;
use App\Models\Contactinfo;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ContactInfoTextUpdate;
use App\Models\AdditionalInfo;

class ContactinfoController extends AppBaseController
{

    private $icon = 'pe-7s-phone';


    public function index(ContactinfoDataTable $contactinfoDataTable)
    {
        $this->authorize('Contactinfo-view');
        $icon = $this->icon;
        $contactInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','contactinfo_text')->orWhere('key','contactinfo_description');
        })->get();
        return $contactinfoDataTable->render('admin.contactinfos.index',compact('icon','contactInfo'));
    }


    public function create()
    {
        $this->authorize('Contactinfo-create');
        return view('admin.contactinfos.create')->with('icon', $this->icon);
    }


    public function store(ContactinfoCreateRequest $request)
    {
        $this->authorize('Contactinfo-create');

        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        Contactinfo::create(array_merge($request->all(),['status' => $status]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.contactinfos.index'));
    }


    public function show(Contactinfo $contactinfo)
    {
        $this->authorize('Contactinfo-view');
        return view('admin.contactinfos.show',compact('contactinfo'))->with('icon', $this->icon);
    }


    public function edit(Contactinfo $contactinfo)
    {
        $this->authorize('Contactinfo-update');
        return view('admin.contactinfos.edit',compact('contactinfo'))->with('icon', $this->icon);
    }


    public function update(Contactinfo $contactinfo, ContactinfoUpdateRequest $request)
    {
        $this->authorize('Contactinfo-update');
        $status = $request->status ?? 0;
        $contactinfo->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.contactinfos.index'));
    }


    public function destroy(Contactinfo $contactinfo)
    {
        $this->authorize('Contactinfo-delete');
        //FileHelper::deleteImage($contactinfo);
        $contactinfo->delete();
    }

    public function saveText(ContactInfoTextUpdate $request)
    {
        $this->authorize('Contactinfo-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','contactinfo_text')->update(['value' => $request->contactinfo_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','contactinfo_description')->update(['value' => $request->contactinfo_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.contactinfos.index'));
    }
}
