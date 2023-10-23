<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ColorSectionManagementRequest;
use App\Http\Requests\HomeManagementRequest;
use App\Models\ColorSection;
use App\Models\Home;
use Illuminate\Http\Request;

class ColorSectionManagementController extends Controller
{

    public function index()
    {
        $this->authorize('Color-section-management');
        $userColorSection = ColorSection::where('user_id', auth()->id())->first();
        return view('admin.sectionManagements.color_section', compact('userColorSection'));
    }


    public function save(ColorSectionManagementRequest $request)
    {
        $this->authorize('Color-section-management');

        $colorSection = ColorSection::where('user_id', auth()->id())->firstOrFail();

        $colorSection->show_status = $request->section_status ? 1 : 0;
        $colorSection->show_button_status = $request->button_status ? 1 : 0;
        $colorSection->text_1 = $request->text_1;
        $colorSection->text_2 = $request->text_2;
        $colorSection->button_text = $request->button_text;
        $colorSection->color = $request->color;
        $colorSection->save();

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }
}
