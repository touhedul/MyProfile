<?php

namespace App\Services;

use App\Models\About;
use App\Models\AdditionalInfo;
use App\Models\ColorSection;
use App\Models\Home;
use App\Models\Menu;
use App\Models\Project;
use App\Models\Service;
use App\Models\Sitelink;
use App\Models\Skill;
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
        $this->createSkillSection($user);
        $this->createProjectSection($user);
        $this->createColorSection($user);
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
        $user->load('services');
        $user->load('additional_infos');
        $user->load('skills');
        $user->load('projects');
        $user->load('color_section');

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

        $this->createServices($user);
    }

    public function createServices($user)
    {
        Service::create([
            'title'=>'Graphic Design',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-palette',
            'user_id' => $user->id
        ]);
        Service::create([
            'title'=>'Web Design',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-desktop',
            'user_id' => $user->id
        ]);
        Service::create([
            'title'=>'Web Development',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-pencil-ruler',
            'user_id' => $user->id
        ]);
        Service::create([
            'title'=>'Brand Identity',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-paint-brush',
            'user_id' => $user->id
        ]);
        Service::create([
            'title'=>'Business Analysis',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-chart-area',
            'user_id' => $user->id
        ]);
        Service::create([
            'title'=>'Digital Marketing',
            'description'=>"We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon'=>'fas fa-bullhorn',
            'user_id' => $user->id
        ]);
    }


    public function createSkillSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'skill_text',
            'value' => 'My Skills',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'skill_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'skill_image',
            'value' => null,
        ]);
        $this->createSkills($user);
    }

    public function createSkills($user)
    {
        Skill::create([
            'user_id' => $user->id,
            'title'=> 'Branding & Desing',
            'percentage'=> 95,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title'=> 'Web Development',
            'percentage'=> 90,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title'=> 'Business Analysis',
            'percentage'=> 75,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title'=> 'Digital Marketing',
            'percentage'=> 85,
        ]);
    }

    public function createProjectSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'project_text',
            'value' => 'My Projects',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'project_description',
            'value' => 'I help you build brand for your business at an affordable price. Thousands of clients have procured exceptional results while working with Me..',
        ]);

        $this->createProjects($user);
    }


    public function createProjects($user)
    {
        Project::create([
            'title'=>'Project Title 1',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 2',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 3',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 4',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 5',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 6',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 7',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 8',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title'=>'Project Title 9',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
    }

    public function createColorSection($user)
    {
        ColorSection::create([
            'user_id' => $user->id,
            'text_1' => 'I am Available for Freelancer',
            'text_2' => 'Start a project with Me today',
            'color' => '#d63384',
            'button_text' => 'Contact',
        ]);
    }
}
