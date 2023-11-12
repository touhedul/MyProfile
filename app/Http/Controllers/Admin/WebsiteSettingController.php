<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdditionalInfo;
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

    public function save()
    {

    }
}
