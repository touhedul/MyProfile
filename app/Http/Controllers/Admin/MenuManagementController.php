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
        $userMenus = UserMenu::where('user_id', auth()->id())->get();
        return view('admin.sectionManagements.menu', compact('userMenus'));
    }


    public function save(Request $request)
    {
        
        $this->authorize('Menu-management');

        $request->validate(
            [
                'user_menu_ids' => 'required|array',
                'menu_titles' => 'required|array',
                'background_colors' => 'required|array',
                'menu_titles.*' => 'required|string|max:30',
            ],
            [
                'menu_titles.*.required' => 'Menu field cannot be empty.',
                'menu_titles.*.max' => 'Menu length is too big.'
            ]
        );

        // return $request;
        foreach ($request->user_menu_ids as $key => $userMenuId) {
            $showStatus = 0;
            if (isset($request->show_status) && is_array($request->show_status)) {
                $showStatus = in_array($userMenuId, $request->show_status) ? 1 : 0;
            }

            UserMenu::where('id', $userMenuId)->update(['menu_title' => $request->menu_titles[$key], 'show_status' => $showStatus,'background_color' => $request->background_colors[$key]]);
        }

        notify()->success(__("Successfully Updated"), __("Success"));
        return back();
    }
}
