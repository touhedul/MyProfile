<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\SkillCreateRequest;
use App\Http\Requests\SkillUpdateRequest;
use App\Models\Skill;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\SkillTextUpdate;
use App\Models\AdditionalInfo;

class SkillController extends AppBaseController
{

    private $icon = 'pe-7s-tools';


    public function index(SkillDataTable $skillDataTable)
    {
        $this->authorize('Skill-view');
        $icon = $this->icon;
        $skillInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','skill_text')->orWhere('key','skill_description')->orWhere('key','skill_image');
        })->get();
        return $skillDataTable->render('admin.skills.index',compact('icon','skillInfo'));
    }


    public function create()
    {
        $this->authorize('Skill-create');
        return view('admin.skills.create')->with('icon', $this->icon);
    }


    public function store(SkillCreateRequest $request)
    {
        $this->authorize('Skill-create');
        $request['user_id'] = auth()->id();
        Skill::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //Skill::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.skills.index'));
    }


    public function show(Skill $skill)
    {
        $this->authorize('Skill-view');
        return view('admin.skills.show',compact('skill'))->with('icon', $this->icon);
    }


    public function edit(Skill $skill)
    {
        $this->authorize('Skill-update');
        return view('admin.skills.edit',compact('skill'))->with('icon', $this->icon);
    }


    public function update(Skill $skill, SkillUpdateRequest $request)
    {
        $this->authorize('Skill-update');
        // $imageName = FileHelper::uploadImage($request, $skill);
        // $skill->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $skill->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.skills.index'));
    }


    public function destroy(Skill $skill)
    {
        $this->authorize('Skill-delete');
        //FileHelper::deleteImage($skill);
        $skill->delete();
    }


    public function saveText(SkillTextUpdate $request)
    {
        $this->authorize('Skill-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','skill_text')->update(['value' => $request->skill_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','skill_description')->update(['value' => $request->skill_description]);

        $additionalInfo = AdditionalInfo::where('user_id',auth()->id())->where('key','skill_image')->first();
        $skill_image = $request->skill_image ? FileHelper::uploadImageByName($request,"skill_image",700,470) : $additionalInfo->skill_image;
        $additionalInfo->update(['value' => $skill_image]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.skills.index'));
    }
}
