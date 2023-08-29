<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\MenuDataTable;
use App\Http\Requests;
use App\Http\Requests\MenuCreateRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use App\Http\Controllers\AppBaseController;

class MenuController extends AppBaseController
{

    private $icon = 'pe-7s-menu';


    public function index(MenuDataTable $menuDataTable)
    {
        $this->authorize('Menu-view');
        $icon = $this->icon;
        return $menuDataTable->render('admin.menus.index',compact('icon'));
    }


    public function create()
    {
        $this->authorize('Menu-create');
        return view('admin.menus.create')->with('icon', $this->icon);
    }


    public function store(MenuCreateRequest $request)
    {
        $this->authorize('Menu-create');
        Menu::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //Menu::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.menus.index'));
    }


    public function show(Menu $menu)
    {
        $this->authorize('Menu-view');
        return view('admin.menus.show',compact('menu'))->with('icon', $this->icon);
    }


    public function edit(Menu $menu)
    {
        $this->authorize('Menu-update');
        return view('admin.menus.edit',compact('menu'))->with('icon', $this->icon);
    }


    public function update(Menu $menu, MenuUpdateRequest $request)
    {
        $this->authorize('Menu-update');
        // $imageName = FileHelper::uploadImage($request, $menu);
        // $menu->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $menu->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.menus.index'));
    }


    public function destroy(Menu $menu)
    {
        $this->authorize('Menu-delete');
        //FileHelper::deleteImage($menu);
        $menu->delete();
    }
}
