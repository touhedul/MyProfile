<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutManagementController extends Controller
{
    public function index()
    {
        $userAbout = About::where('user_id',auth()->id())->firstOrFail();
        return view('admin.sectionManagements.about',compact('userAbout'));
    }

    public function save()
    {

    }

}
