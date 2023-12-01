<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProfessionDataTable;
use App\Http\Requests;
use App\Http\Requests\ProfessionCreateRequest;
use App\Http\Requests\ProfessionUpdateRequest;
use App\Models\Profession;
use App\Http\Controllers\AppBaseController;
use App\Models\Menu;

class ProfessionController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(ProfessionDataTable $professionDataTable)
    {
        $this->authorize('Profession-view');
        $icon = $this->icon;
        return $professionDataTable->render('admin.professions.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('Profession-create');
        $menus = Menu::orderBy('name')->get();
        return view('admin.professions.create',compact('menus'))->with('icon', $this->icon);
    }


    public function store(ProfessionCreateRequest $request)
    {
        // return $request;
        $this->authorize('Profession-create');
        $status = $request->status ?? 0;
        $profession = Profession::create(array_merge($request->all(),['status' => $status]));
        $profession->menus()->attach($request->menu_id);
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.professions.index'));
    }


    public function show(Profession $profession)
    {
        $this->authorize('Profession-view');
        return view('admin.professions.show',compact('profession'))->with('icon', $this->icon);
    }


    public function edit(Profession $profession)
    {
        $this->authorize('Profession-update');
        $menus = Menu::orderBy('name')->get();
        return view('admin.professions.edit',compact('profession','menus'))->with('icon', $this->icon);
    }


    public function update(Profession $profession, ProfessionUpdateRequest $request)
    {
        $this->authorize('Profession-update');
        $status = $request->status ?? 0;
        $profession->fill(array_merge($request->all(),['status' => $status]))->save();
        $profession->menus()->sync($request->menu_id);
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.professions.index'));
    }


    public function destroy(Profession $profession)
    {
        $this->authorize('Profession-delete');

        $profession->menus()->detach();
        //FileHelper::deleteImage($profession);
        $profession->delete();
    }
}
