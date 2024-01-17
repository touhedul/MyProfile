<?php

namespace App\Services;

use App\Models\About;
use App\Models\Achievement;
use App\Models\AdditionalInfo;
use App\Models\Client;
use App\Models\ColorSection;
use App\Models\Contactinfo;
use App\Models\Course;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Home;
use App\Models\Menu;
use App\Models\Project;
use App\Models\Service;
use App\Models\Sitelink;
use App\Models\Skill;
use App\Models\Social;
use App\Models\Testimonial;
use App\Models\Theme;
use App\Models\User;
use App\Models\UserMenu;
use App\Models\UserTheme;
use Illuminate\Support\Facades\DB;

class UserService
{
    public function createUserInfo($user)
    {
        DB::beginTransaction();
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
        $this->createCourseSection($user);
        $this->createExperienceSection($user);
        $this->createAchievementSection($user);
        $this->createEducationSection($user);
        $this->createTestimonialSection($user);
        $this->createClientSection($user);
        $this->createContactinfoSection($user);
        $this->createFooterSection($user);
        $this->createSettings($user);
        DB::commit();
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
        $user->load('courses');
        $user->load('experiences');
        $user->load('achievements');
        $user->load('educations');
        $user->load('testimonials');
        $user->load('clients');
        $user->load('contactinfos');

        return $user;
    }

    public function createMenus($user)
    {
        $menus = Menu::all();;

        $userMenus = array();
        foreach ($menus as $menu) {
            $userMenus[] = ['user_id' => $user->id, 'menu_id' => $menu->id, 'menu_title' => $menu->name, 'show_status' => $menu->status, 'background_color' => $menu->background_color, 'created_at' => now(), 'updated_at' => now()];
            // UserMenu::create($userMenus);
        }
        UserMenu::insert($userMenus);
    }


    public function createHomeSection($user)
    {
        $defaultHomeSliders = (new DefaultImageService)->getHomeSliders();

        Home::create([
            'user_id' => $user->id,
            'text_1' => 'WELCOME TO MY REALM OF EXCELLENCE',
            'text_2' => json_encode(["I'm $user->name", "I'm a $user->profession"]),
            'text_3' => 'Laravel Developer',
            'button_text' => 'Download CV',
            'default_slider_1' => $defaultHomeSliders[0],
            'default_slider_2' => $defaultHomeSliders[1],
            'default_slider_3' => $defaultHomeSliders[2],
        ]);
    }


    public function createAboutSection($user)
    {
        About::create([
            'user_id' => $user->id,
            'text_1' => 'About Me',
            'text_2' => 'Hello! I am ' . $user->name,
            'text_3' => "I am always eager to take on new challenges that push me to grow and learn. I'm dedicated to delivering quality results in every project I undertake. I'm known for my proficiency and attention to detail.I find joy in exploring the world both intellectually and physically.
            <br>
            <br>
            Outside of the professional realm, you can often find me in different extra curriculum activities. I believe in the importance of maintaining a well-rounded and balanced life.
            <br>
            <br>
            Feel free to reach out if you share common interests or just want to connect. I'm excited to embark on this journey of growth, connection, and discovery!",

            'count_1' => '5',
            'count_text_1' => 'Years Experiance',
            'count_2' => '17',
            'count_text_2' => 'Skill Set',
            'count_3' => '26',
            'count_text_3' => 'Projects Done',
            'button_text' => 'Contact Me',
            'button_status' => true,
            'extra_text' => 'Discover my projects',
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
            'title' => 'Graphic Design',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-palette',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Web Design',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-desktop',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Web Development',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-pencil-ruler',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Brand Identity',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-paint-brush',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Business Analysis',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-chart-area',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Digital Marketing',
            'description' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge.",
            'icon' => 'fas fa-bullhorn',
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
            'title' => 'Branding & Desing',
            'percentage' => 95,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title' => 'Web Development',
            'percentage' => 90,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title' => 'Business Analysis',
            'percentage' => 75,
        ]);
        Skill::create([
            'user_id' => $user->id,
            'title' => 'Digital Marketing',
            'percentage' => 85,
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
            'title' => 'Project Title 1',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 2',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 3',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 4',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 5',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 6',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 7',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 8',
            'user_id' => $user->id,
            'details' => '<p><strong>Project Info:</strong></p><p>Quidam lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure. Lisque persius interesset his et, in quot quidam persequeris vim, ad mea essent possim iriure.</p><p><strong>Project Details:</strong></p><ul><li>Client:Neil Patel</li><li>Industry:Information Technologies</li><li>Technologies:HTML5, CSS3, PHP, jQuery, Bootstrap 4</li><li>Date:Jan 22, 2020</li></ul>',
        ]);
        Project::create([
            'title' => 'Project Title 9',
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

    public function createCourseSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'course_text',
            'value' => 'My Course',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'course_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createCourse($user);
    }

    public function createCourse($user)
    {
        Course::create([
            'user_id' => $user->id,
            'title' => 'Planning & Consulting',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => 'Content',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => 'Conception',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => 'Design & Development',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => 'Final discussion',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => 'Delivery & Launch',
            'details' => "We're smart, we're hard working, we're easy to talk to, and we love a challenge lisque persius mea essent possim iriure.",
        ]);
    }

    public function createExperienceSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'experience_text',
            'value' => 'My experience',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'experience_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createExperience($user);
    }

    public function createExperience($user)
    {
        Experience::create([
            'user_id' => $user->id,
            'company' => 'Company 1',
            'role' => 'Designer',
            'details' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
            'duration' => '2 Year',
            'year' => 2016,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'Company 2',
            'role' => 'Developer',
            'details' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
            'duration' => '1 Year',
            'year' => 2018,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'Company 3',
            'role' => 'Visulaizer',
            'details' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
            'duration' => '6 Month',
            'year' => 2019,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'Company 4',
            'role' => 'Business Analyst',
            'details' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
            'duration' => '1 Year',
            'year' => 2020,
        ]);
    }


    public function createAchievementSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'achievement_text',
            'value' => 'My achievement',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'achievement_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createAchievement($user);
    }

    public function createAchievement($user)
    {
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Champion in Hackathon',
            'details' => 'This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Participate in Student 2 Startup',
            'details' => 'This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }


    public function createEducationSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'education_text',
            'value' => 'My education',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'education_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createEducation($user);
    }

    public function createEducation($user)
    {
        Education::create([
            'user_id' => $user->id,
            'name' => 'S.S.C',
            'details' => 'This is a SSC paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        Education::create([
            'user_id' => $user->id,
            'name' => 'H.S.C',
            'details' => 'This is a HSC paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        Education::create([
            'user_id' => $user->id,
            'name' => 'Honours',
            'details' => 'This is a Honours paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }


    public function createTestimonialSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'testimonial_text',
            'value' => 'My testimonial',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'testimonial_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createTestimonial($user);
    }

    public function createTestimonial($user)
    {
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Touhedul Islam',
            'designation' => 'Founder at ratul tech',
            'message' => 'This is a SSC paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Fayes Islam',
            'designation' => 'CEO at ratul tech',
            'message' => 'This is a SSC paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Torikul Islam',
            'designation' => 'CTO at ratul tech',
            'message' => 'This is a SSC paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.This is a demo paragraph. Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
        ]);
    }

    public function createClientSection($user)
    {
        Client::create([
            'user_id' => $user->id,
            'image' => ''
        ]);
        Client::create([
            'user_id' => $user->id,
            'image' => ''
        ]);
        Client::create([
            'user_id' => $user->id,
            'image' => ''
        ]);
        Client::create([
            'user_id' => $user->id,
            'image' => ''
        ]);
    }

    public function createContactinfoSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'contactinfo_text',
            'value' => 'My contact info',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'contactinfo_description',
            'value' => 'How I can help take your next project to new heights! Thousands of clients have procured exceptional results while working with Me.',
        ]);
        $this->createContactinfo($user);
    }

    public function createContactinfo($user)
    {
        Contactinfo::create([
            'user_id' => $user->id,
            'title' => 'VISIT US',
            'details' => '145 Murphy Canyon Rd. <br> Suite 100-18, San Diego CA 2028',
            'icon' => 'fas fa-map-marker-alt',
        ]);

        Contactinfo::create([
            'user_id' => $user->id,
            'title' => 'CALL US NOW',
            'details' => 'Phone: (+060) 9898980098 <br>Fax: (+060) 8898880088',
            'icon' => 'fas fa-phone-alt',
        ]);

        Contactinfo::create([
            'user_id' => $user->id,
            'title' => 'INQUIRIES',
            'details' => 'info@kenilpatel.com <br>Mon to Fri (10 am – 8 pm)',
            'icon' => 'fas fa-envelope',
        ]);
    }


    public function createFooterSection($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'footer_text',
            'value' => 'Copyright ©  ' . date('Y') . " " . $user->name . '. All Rights Reserved.',
        ]);
        $this->createSocial($user);
    }

    public function createSocial($user)
    {
        Social::create([
            'user_id' => $user->id,
            'link' => 'https://twitter.com',
            'icon' => 'fab fa-twitter',
        ]);
        Social::create([
            'user_id' => $user->id,
            'link' => 'https://facebook.com',
            'icon' => 'fab fa-facebook-f',
        ]);
        Social::create([
            'user_id' => $user->id,
            'link' => 'https://linkedin.com',
            'icon' => 'fab fa-linkedin-in',
        ]);
        Social::create([
            'user_id' => $user->id,
            'link' => 'https://github.com',
            'icon' => 'fab fa-github',
        ]);
    }


    public function createSettings($user)
    {
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'logo',
            'value' => '',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'theme_color',
            'value' => '#d63384',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'header_color',
            'value' => '#111111',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'footer_color',
            'value' => '#111418',
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'particle_status',
            'value' => true,
        ]);
        AdditionalInfo::create([
            'user_id' => $user->id,
            'key' => 'preloader_status',
            'value' => false,
        ]);
    }
}
