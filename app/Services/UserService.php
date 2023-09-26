<?php

namespace App\Services;

use App\Models\About;
use App\Models\AdditionalInfo;
use App\Models\Home;
use App\Models\Menu;
use App\Models\Service;
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
        $this->createAboutSection($user);
        $this->createServiceSection($user);
    }

    public function createTheme($user)
    {
        $theme = Theme::where('default_status', 1)->first();
        UserTheme::create(['user_id' => $user->id, 'theme_id' => $theme->id, 'default_status' => 1]);
    }

    public function createWebsiteURL($user)
    {
        $link = route('index') . "/" . base64_encode($user->id);
        Sitelink::create(['user_id' => $user->id, 'link' => $link]);
    }

    public function userInfoForSite($userId)
    {
        $user = User::findOrFail($userId);
        $user->load('default_theme');
        $user->load('home');
        $user->load('menus');
        $user->load('about');

        return $user;
    }

    public function createMenus($user)
    {
        $menus = Menu::where('status', 1)->get();

        $userMenus = array();
        foreach ($menus as $menu) {
            $userMenus[] = ['user_id' => $user->id, 'menu_id' => $menu->id, 'menu_title' => $menu->name, 'created_at' => now(), 'updated_at' => now()];
        }
        UserMenu::insert($userMenus);
    }


    public function createHomeSection($user)
    {
        Home::create([
            'user_id' => $user->id,
            'text_1' => 'WELCOME TO MY WORLD',
            'text_2' => json_encode(["I'm $user->name", "I'm a $user->profession"]),
            'text_3' => 'lived in Dhaka, Bangladesh',
            'button_text' => 'Download CV',
        ]);
    }


    public function createAboutSection($user)
    {
        About::create([
            'user_id' => $user->id,
            'text_1' => 'About Me',
            'text_2' => 'Hello! I am ' . $user->name,
            'text_3' => "I combine our passion for design focused in people with advanced development technologies. 350+ clients have procured exceptional results and happiness while working with me.

            Delivering work within time and budget which meets client’s requirements is our moto. when an unknown printer took a galley of type and scrambled it to make a type specimen book lorem Ipsum has been the industry's standard. Lorem Ipsum has been the industry's standard dummy text ever since.",
            'count_1' => '10',
            'count_text_1' => 'Years Experiance',
            'count_2' => '20',
            'count_text_2' => 'Happy Clients',
            'count_3' => '30',
            'count_text_3' => 'Projects Done',
            'button_text' => 'My Services',
            'button_status' => true,
            'extra_text' => 'Discover my portfolio',
        ]);
    }


    public function createServiceSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'service_text',
            'value' => 'My Services',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'service_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);

        // Service::create([
        //     'title',
        //     'description',
        //     'icon',
        // ]);
    }
}
