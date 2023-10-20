<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProjectDataTable;
use App\Http\Requests;
use App\Http\Requests\ProjectCreateRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;
use App\Http\Controllers\AppBaseController;
use App\Helpers\FileHelper;

class ProjectController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(ProjectDataTable $projectDataTable)
    {
        $this->authorize('Project-view');
        $icon = $this->icon;
        return $projectDataTable->render('admin.projects.index',compact('icon'));
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
}
