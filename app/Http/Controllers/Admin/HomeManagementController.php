<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class HomeManagementController extends Controller
{
    public function index()
    {

        $this->authorize('Home-management');
        $userHome = Home::where('user_id', auth()->id())->first();
        $userHome->text_2 = json_decode($userHome->text_2);
        // return $userHome;
        return view('admin.homeManagement.index', compact('userHome'));
    }
}
