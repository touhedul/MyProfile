<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ThemeDataTable;
use App\Http\Requests;
use App\Http\Requests\ThemeCreateRequest;
use App\Http\Requests\ThemeUpdateRequest;
use App\Models\Theme;
use App\Http\Controllers\AppBaseController;

class ThemeController extends AppBaseController
{

    private $icon = 'pe-7s-plugin';


    public function index(ThemeDataTable $themeDataTable)
    {
        $this->authorize('Theme-view');
        $icon = $this->icon;
        return $themeDataTable->render('admin.themes.index', compact('icon'));
    }


    public function create()
    {
        $this->authorize('Theme-create');
        return view('admin.themes.create')->with('icon', $this->icon);
    }


    public function store(ThemeCreateRequest $request)
    {
        $this->authorize('Theme-create');
        Theme::create($request->all());
        //$imageName = FileHelper::uploadImage($request);
        //Theme::create(array_merge($request->all(), ['image' => $imageName]));
        notify()->success(__("Successfully Created"), __("Success"));
        return redirect(route('admin.themes.index'));
    }


    public function show(Theme $theme)
    {
        $this->authorize('Theme-view');
        return view('admin.themes.show', compact('theme'))->with('icon', $this->icon);
    }


    public function edit(Theme $theme)
    {
        $this->authorize('Theme-update');
        return view('admin.themes.edit', compact('theme'))->with('icon', $this->icon);
    }


    public function update(Theme $theme, ThemeUpdateRequest $request)
    {
        $this->authorize('Theme-update');
        // $imageName = FileHelper::uploadImage($request, $theme);
        // $theme->fill(array_merge($request->all(), ['image' => $imageName]))->save();
        $theme->fill($request->all())->save();
        notify()->success(__("Successfully Updated"), __("Success"));
        return redirect(route('admin.themes.index'));
    }


    public function destroy(Theme $theme)
    {
        $this->authorize('Theme-delete');
        //FileHelper::deleteImage($theme);
        $theme->delete();
    }
}
