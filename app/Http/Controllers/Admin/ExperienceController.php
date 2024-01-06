<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ExperienceDataTable;
use App\Http\Requests;
use App\Http\Requests\ExperienceCreateRequest;
use App\Http\Requests\ExperienceUpdateRequest;
use App\Models\Experience;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\ExperienceTextUpdate;
use App\Models\AdditionalInfo;

class ExperienceController extends AppBaseController
{

    private $icon = 'pe-7s-global';


    public function index(ExperienceDataTable $experienceDataTable)
    {
        $this->authorize('Experience-view');
        $icon = $this->icon;
        $experienceInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','experience_text')->orWhere('key','experience_description');
        })->get();
        return $experienceDataTable->render('admin.experiences.index',compact('icon','experienceInfo'));
    }


    public function create()
    {
        $this->authorize('Experience-create');
        return view('admin.experiences.create')->with('icon', $this->icon);
    }


    public function store(ExperienceCreateRequest $request)
    {
        $this->authorize('Experience-create');
        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        Experience::create(array_merge($request->all(),['status'=>$status]));
        //$imageName = FileHelper::uploadImage($request);
        //Experience::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.experiences.index'));
    }


    public function show(Experience $experience)
    {
        $this->authorize('Experience-view');
        return view('admin.experiences.show',compact('experience'))->with('icon', $this->icon);
    }


    public function edit(Experience $experience)
    {
        $this->authorize('Experience-update');
        return view('admin.experiences.edit',compact('experience'))->with('icon', $this->icon);
    }


    public function update(Experience $experience, ExperienceUpdateRequest $request)
    {
        $this->authorize('Experience-update');

        $status = $request->status ?? 0;
        $experience->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.experiences.index'));
    }


    public function destroy(Experience $experience)
    {
        $this->authorize('Experience-delete');
        //FileHelper::deleteImage($experience);
        $experience->delete();
    }

    public function saveText(ExperienceTextUpdate $request)
    {
        $this->authorize('Experience-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','experience_text')->update(['value' => $request->experience_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','experience_description')->update(['value' => $request->experience_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.experiences.index'));
    }
}
