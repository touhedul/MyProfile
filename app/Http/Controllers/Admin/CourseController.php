<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\CourseDataTable;
use App\Http\Requests;
use App\Http\Requests\CourseCreateRequest;
use App\Http\Requests\CourseUpdateRequest;
use App\Models\Course;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\CourseTextUpdate;
use App\Models\AdditionalInfo;

class CourseController extends AppBaseController
{

    private $icon = 'pe-7s-notebook';


    public function index(CourseDataTable $courseDataTable)
    {
        $this->authorize('Course-view');
        $icon = $this->icon;
        $courseInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','course_text')->orWhere('key','course_description');
        })->get();
        return $courseDataTable->render('admin.courses.index',compact('icon','courseInfo'));
    }


    public function create()
    {
        $this->authorize('Course-create');
        return view('admin.courses.create')->with('icon', $this->icon);
    }


    public function store(CourseCreateRequest $request)
    {
        $this->authorize('Course-create');

        $status = $request->status ?? 0;
        $request['user_id'] = auth()->id();
        Course::create(array_merge($request->all(),['status'=>$status]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.courses.index'));
    }


    public function show(Course $course)
    {
        $this->authorize('Course-view');
        return view('admin.courses.show',compact('course'))->with('icon', $this->icon);
    }


    public function edit(Course $course)
    {
        $this->authorize('Course-update');
        return view('admin.courses.edit',compact('course'))->with('icon', $this->icon);
    }


    public function update(Course $course, CourseUpdateRequest $request)
    {
        $this->authorize('Course-update');
        $status = $request->status ?? 0;
        $course->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.courses.index'));
    }


    public function destroy(Course $course)
    {
        $this->authorize('Course-delete');
        //FileHelper::deleteImage($course);
        $course->delete();
    }

    public function saveText(CourseTextUpdate $request)
    {
        $this->authorize('Course-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','course_text')->update(['value' => $request->course_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','course_description')->update(['value' => $request->course_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.courses.index'));
    }
}
