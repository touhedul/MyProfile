<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SkillListDataTable;
use App\Http\Requests;
use App\Http\Requests\SkillListCreateRequest;
use App\Http\Requests\SkillListUpdateRequest;
use App\Models\SkillList;
use App\Http\Controllers\AppBaseController;

class SkillListController extends AppBaseController
{

    private $icon = 'pe-7s-star';


    public function index(SkillListDataTable $skillListDataTable)
    {
        $this->authorize('SkillList-view');
        $icon = $this->icon;
        return $skillListDataTable->render('admin.skill_lists.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('SkillList-create');
        return view('admin.skill_lists.create')->with('icon', $this->icon);
    }


    public function store(SkillListCreateRequest $request)
    {
        $this->authorize('SkillList-create');
        SkillList::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //SkillList::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.skillLists.index'));
    }


    public function show(SkillList $skillList)
    {
        $this->authorize('SkillList-view');
        return view('admin.skill_lists.show', compact('skillList'))->with('icon', $this->icon);
    }


    public function edit(SkillList $skillList)
    {
        $this->authorize('SkillList-update');
        return view('admin.skill_lists.edit', compact('skillList'))->with('icon', $this->icon);
    }


    public function update(SkillList $skillList, SkillListUpdateRequest $request)
    {
        $this->authorize('SkillList-update');
        // $imageName = FileHelper::uploadImage($request, $skillList);
        // $skillList->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $skillList->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.skillLists.index'));
    }


    public function destroy(SkillList $skillList)
    {
        $this->authorize('SkillList-delete');
        //FileHelper::deleteImage($skillList);
        $skillList->delete();
    }
}
