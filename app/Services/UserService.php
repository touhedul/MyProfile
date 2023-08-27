<?php

namespace App\Services;

use App\Models\Sitelink;
use App\Models\Theme;
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
        $theme = Theme::first();
        UserTheme::create(['user_id'=>$user->id,'theme_id'=>$theme->id,'default'=>1]);
    }

    public function createWebsiteURL($user)
    {
        $link = route('index')."/".base64_encode($user->id);
        Sitelink::create(['user_id'=>$user->id,'link'=>$link]);
    }
}
