<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Requests;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Http\Controllers\AppBaseController;
use App\Helpers\FileHelper;
use App\Http\Requests\ProjectTextUpdate;
use App\Models\AdditionalInfo;

class ProjectController extends AppBaseController
{

    private $icon = 'pe-7s-portfolio';


    public function index(ProjectDataTable $projectDataTable)
    {

        $this->authorize('Project-view');
        $icon = $this->icon;
        $projectInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','project_text')->orWhere('key','project_description');
        })->get();
        return $projectDataTable->render('admin.projects.index',compact('icon','projectInfo'));
    }


    public function create()
    {
        $this->authorize('Project-create');
        return view('admin.projects.create')->with('icon', $this->icon);
    }


    public function store(ProjectCreateRequest $request)
    {
        $this->authorize('Project-create');

        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        $imageName = FileHelper::uploadImage($request);
        Project::create(array_merge($request->all(), ['image' => $imageName,'status'=>$status]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.projects.index'));
    }


    public function show(Project $project)
    {
        $this->authorize('Project-view');
        return view('admin.projects.show',compact('project'))->with('icon', $this->icon);
    }


    public function edit(Project $project)
    {
        $this->authorize('Project-update');
        return view('admin.projects.edit',compact('project'))->with('icon', $this->icon);
    }


    public function update(Project $project, ProjectUpdateRequest $request)
    {
        $this->authorize('Project-update');
        $imageName = FileHelper::uploadImage($request, $project);
        $status = $request->status ?? 0;
        $project->fill(array_merge($request->all(), ['image' => $imageName,'status' =>$status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.projects.index'));
    }


    public function destroy(Project $project)
    {
        $this->authorize('Project-delete');
        FileHelper::deleteImage($project);
        $project->delete();
    }

    public function saveText(ProjectTextUpdate $request)
    {
        $this->authorize('Project-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','project_text')->update(['value' => $request->project_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','project_description')->update(['value' => $request->project_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.projects.index'));
    }
}
