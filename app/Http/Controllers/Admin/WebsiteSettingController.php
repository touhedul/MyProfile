<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use App\Models\AdditionalInfo;
use App\Models\ColorSection;
use Illuminate\Http\Request;

class WebsiteSettingController extends Controller
{

    public function index()
    {
       $websiteSettings = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','logo')
            ->orWhere('key','theme_color')
            ->orWhere('key','header_color')
            ->orWhere('key','footer_color')
            ->orWhere('key','particle_status')
            ->orWhere('key','preloader_status');
        })->get();
        return view('admin.sectionManagements.website_setting',compact('websiteSettings'));
    }

    public function save(Request $request)
    {

        $websiteSettings = AdditionalInfo::where('user_id',auth()->id())->where(function($query){
            $query->where('key','logo')
            ->orWhere('key','theme_color')
            ->orWhere('key','header_color')
            ->orWhere('key','footer_color')
            ->orWhere('key','particle_status')
            ->orWhere('key','preloader_status');
        })->get();

        if ($request->hasFile('logo')) {
            $image = FileHelper::uploadImageByName($request, 'logo', 70, 30);
            $websiteSettings->where('key','logo')->first()->update(['value'=>$image]);
        }
        $websiteSettings->where('key','theme_color')->first()->update(['value'=>$request->theme_color]);
        $websiteSettings->where('key','header_color')->first()->update(['value'=>$request->header_color]);
        $websiteSettings->where('key','footer_color')->first()->update(['value'=>$request->footer_color]);
        $websiteSettings->where('key','particle_status')->first()->update(['value'=>$request->particle_status ? 1 : 0]);
        $websiteSettings->where('key','preloader_status')->first()->update(['value'=>$request->preloader_status ? 1 : 0]);

        ColorSection::where('user_id', auth()->id())->update(['color'=>$request->theme_color]);

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();

    }
}
