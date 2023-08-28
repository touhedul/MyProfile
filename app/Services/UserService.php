<?php

namespace App\Services;

use App\Models\Sitelink;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserTheme;

class UserService
{
    public function createUserInfo($user)
    {
        $user->assignRole('customer');
        $this->createTheme($user);
        $this->createWebsiteURL($user);
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
}
