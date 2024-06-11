<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProfessionCategoryDataTable;
use App\Http\Requests;
use App\Http\Requests\ProfessionCategoryCreateRequest;
use App\Http\Requests\ProfessionCategoryUpdateRequest;
use App\Models\ProfessionCategory;
use App\Http\Controllers\AppBaseController;

class ProfessionCategoryController extends AppBaseController
{

    private $icon = 'pe-7s-map';


    public function index(ProfessionCategoryDataTable $professionCategoryDataTable)
    {
        $this->authorize('ProfessionCategory-view');
        $icon = $this->icon;
        return $professionCategoryDataTable->render('admin.profession_categories.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('ProfessionCategory-create');
        return view('admin.profession_categories.create')->with('icon', $this->icon);
    }


    public function store(ProfessionCategoryCreateRequest $request)
    {
        $this->authorize('ProfessionCategory-create');
        ProfessionCategory::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //ProfessionCategory::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.professionCategories.index'));
    }


    public function show(ProfessionCategory $professionCategory)
    {
        $this->authorize('ProfessionCategory-view');
        return view('admin.profession_categories.show', compact('professionCategory'))->with('icon', $this->icon);
    }


    public function edit(ProfessionCategory $professionCategory)
    {
        $this->authorize('ProfessionCategory-update');
        return view('admin.profession_categories.edit', compact('professionCategory'))->with('icon', $this->icon);
    }


    public function update(ProfessionCategory $professionCategory, ProfessionCategoryUpdateRequest $request)
    {
        $this->authorize('ProfessionCategory-update');
        // $imageName = FileHelper::uploadImage($request, $professionCategory);
        // $professionCategory->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $professionCategory->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.professionCategories.index'));
    }


    public function destroy(ProfessionCategory $professionCategory)
    {
        $this->authorize('ProfessionCategory-delete');
        //FileHelper::deleteImage($professionCategory);
        $professionCategory->delete();
    }
}
