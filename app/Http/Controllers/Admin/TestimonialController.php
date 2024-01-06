<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\TestimonialDataTable;
use App\Helpers\FileHelper;
use App\Http\Requests;
use App\Http\Requests\TestimonialCreateRequest;
use App\Http\Requests\TestimonialUpdateRequest;
use App\Models\Testimonial;
use App\Http\Controllers\AppBaseController;
use App\Http\Requests\TestimonialTextUpdate;
use App\Models\AdditionalInfo;

class TestimonialController extends AppBaseController
{

    private $icon = 'pe-7s-news-paper';


    public function index(TestimonialDataTable $testimonialDataTable)
    {
        $this->authorize('Testimonial-view');
        $icon = $this->icon;
        $testimonialInfo = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','testimonial_text')->orWhere('key','testimonial_description');
        })->get();
        return $testimonialDataTable->render('admin.testimonials.index',compact('icon','testimonialInfo'));
    }


    public function create()
    {
        $this->authorize('Testimonial-create');
        return view('admin.testimonials.create')->with('icon', $this->icon);
    }


    public function store(TestimonialCreateRequest $request)
    {
        $this->authorize('Testimonial-create');

        $status = $request->status ?? 0;
        $imageName = FileHelper::uploadImage($request,null,[],65,65);
        Testimonial::create(array_merge($request->all(),['status'=>$status,'image' => $imageName,'user_id'=>auth()->id()]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.testimonials.index'));
    }


    public function show(Testimonial $testimonial)
    {
        $this->authorize('Testimonial-view');
        return view('admin.testimonials.show',compact('testimonial'))->with('icon', $this->icon);
    }


    public function edit(Testimonial $testimonial)
    {
        $this->authorize('Testimonial-update');
        return view('admin.testimonials.edit',compact('testimonial'))->with('icon', $this->icon);
    }


    public function update(Testimonial $testimonial, TestimonialUpdateRequest $request)
    {
        $this->authorize('Testimonial-update');
        $imageName = FileHelper::uploadImage($request, $testimonial,[],700,460);
        $status = $request->status ?? 0;
        $testimonial->fill(array_merge($request->all(), ['image' => $imageName,'status'=>$status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.testimonials.index'));
    }


    public function destroy(Testimonial $testimonial)
    {
        $this->authorize('Testimonial-delete');
        //FileHelper::deleteImage($testimonial);
        $testimonial->delete();
    }

    public function saveText(TestimonialTextUpdate $request)
    {
        $this->authorize('Testimonial-update');
        AdditionalInfo::where('user_id',auth()->id())->where('key','testimonial_text')->update(['value' => $request->testimonial_text]);
        AdditionalInfo::where('user_id',auth()->id())->where('key','testimonial_description')->update(['value' => $request->testimonial_description]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.testimonials.index'));
    }
}
