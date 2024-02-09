<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\EducationDataTable;
use App\Http\Requests;
use App\Http\Requests\EducationCreateRequest;
use App\Http\Requests\EducationUpdateRequest;
use App\Models\Education;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\EducationTextUpdate;
use App\Models\AdditionalInfo;

class EducationController extends AppBaseController
{

    private $icon = 'pe-7s-study';


    public function index(EducationDataTable $educationDataTable)
    {
        $this->authorize('Education-view');
        $icon = $this->icon;
        $educationInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','education_text')->orWhere('key','education_description');
        })->get();
        return $educationDataTable->render('admin.education.index',compact('icon','educationInfo'));
    }


    public function create()
    {
        $this->authorize('Education-create');
        return view('admin.education.create')->with('icon', $this->icon);
    }


    public function store(EducationCreateRequest $request)
    {
        $this->authorize('Education-create');

        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        Education::create(array_merge($request->all(),['status'=>$status]));

        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.education.index'));
    }


    public function show(Education $education)
    {
        $this->authorize('Education-view');
        checkUserAndAuthId($education);
        return view('admin.education.show',compact('education'))->with('icon', $this->icon);
    }


    public function edit(Education $education)
    {
        $this->authorize('Education-update');
        checkUserAndAuthId($education);
        return view('admin.education.edit',compact('education'))->with('icon', $this->icon);
    }


    public function update(Education $education, EducationUpdateRequest $request)
    {
        $this->authorize('Education-update');
        checkUserAndAuthId($education);
        $status = $request->status ?? 0;
        $education->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.education.index'));
    }


    public function destroy(Education $education)
    {
        $this->authorize('Education-delete');
        checkUserAndAuthId($education);
        $education->delete();
    }

    public function saveText(EducationTextUpdate $request)
    {
        $this->authorize('Education-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','education_text')->update(['value' => $request->education_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','education_description')->update(['value' => $request->education_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.education.index'));
    }
}
