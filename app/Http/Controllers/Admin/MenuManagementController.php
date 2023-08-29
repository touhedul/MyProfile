<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\UserMenu;
use Illuminate\Http\Request;

class MenuManagementController extends Controller
{

    public function index()
    {
        $this->authorize('Menu-management');
        return $userMenus = UserMenu::where('user_id',auth()->id())->get();
        return view('admin.menuManagement.index');
    }
}
