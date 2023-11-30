<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProfessionDataTable;
use App\Http\Requests;
use App\Http\Requests\ProfessionCreateRequest;
use App\Http\Requests\ProfessionUpdateRequest;
use App\Models\Profession;
use App\Http\Controllers\AppBaseController;

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
        return view('admin.professions.create')->with('icon', $this->icon);
    }


    public function store(ProfessionCreateRequest $request)
    {
        $this->authorize('Profession-create');
        $status = $request->status ?? 0;
        Profession::create(array_merge($request->all(),['status' => $status]));
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
        return view('admin.professions.edit',compact('profession'))->with('icon', $this->icon);
    }


    public function update(Profession $profession, ProfessionUpdateRequest $request)
    {
        $this->authorize('Profession-update');
        $status = $request->status ?? 0;
        $profession->fill(array_merge($request->all(),['status' => $status]))->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.professions.index'));
    }


    public function destroy(Profession $profession)
    {
        $this->authorize('Profession-delete');
        //FileHelper::deleteImage($profession);
        $profession->delete();
    }
}
