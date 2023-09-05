<?php

namespace App\Services;

use App\Models\Home;
use App\Models\Menu;
use App\Models\Sitelink;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserMenu;
use App\Models\UserTheme;

class UserService
{
    public function createUserInfo($user)
    {
        $user->assignRole('customer');
        $this->createTheme($user);
        $this->createWebsiteURL($user);
        $this->createMenus($user);
        $this->createHomeSection($user);
    }

    public function createTheme($user)
    {
        $theme = Theme::where('default_status',1)->first();
        UserTheme::create(['user_id'=>$user->id,'theme_id'=>$theme->id,'default_status'=>1]);
    }

    public function createWebsiteURL($user)
    {
        $link = route('index')."/".base64_encode($user->id);
        Sitelink::create(['user_id'=>$user->id,'link'=>$link]);
    }

    public function userInfoForSite($userId)
    {
        $user = User::findOrFail($userId);
        $user->load('default_theme');
        return $user;
    }

    public function createMenus($user)
    {
        $menus = Menu::where('status',1)->get();

        $userMenus = array();
        foreach ($menus as $menu) {
            $userMenus[] = ['user_id' => $user->id,'menu_id' => $menu->id,'menu_title' => $menu->name,'created_at' => now(),'updated_at' => now()];
        }
        UserMenu::insert($userMenus);
    }


    public function createHomeSection($user)
    {
        Home::create([
            'user_id' => $user->id,
            'text_1' => 'WELCOME TO MY WORLD',
            'text_2' => json_encode(["I'm $user->name","I'm a $user->profession"]),
            'text_3' => 'based in Dhaka, Bangladesh',
            'button_text' => 'Download CV',
        ]);
    }
}
