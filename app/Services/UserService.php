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
            'count_text_1' => 'Years Experience',
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
            'value' => ' Elevate your brand with my comprehensive services. From design to strategy, I offer tailored solutions that resonate and drive success for your business.',
        ]);

        $this->createServices($user);
    }

    public function createServices($user)
    {
        Service::create([
            'title' => 'Graphic Design',
            'description' => "Unlocking creativity through pixels, I craft visually stunning designs that captivate and convey your brand's essence.",
            'icon' => 'fas fa-palette',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Web Design',
            'description' => "Building digital experiences that resonate. My web designs seamlessly blend aesthetics with user-centric functionality.",
            'icon' => 'fas fa-desktop',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Web Development',
            'description' => "Transforming ideas into dynamic web solutions. I specialize in coding the future, ensuring your online presence is top-notch.",
            'icon' => 'fas fa-pencil-ruler',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Brand Identity',
            'description' => "Crafting brands that stand out. From logos to messaging, I shape cohesive identities that leave a lasting impression.",
            'icon' => 'fas fa-paint-brush',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Business Analysis',
            'description' => "Navigating the complexities of business with precision. I analyze data to drive strategic decisions and enhance efficiency.",
            'icon' => 'fas fa-chart-area',
            'user_id' => $user->id
        ]);
        Service::create([
            'title' => 'Digital Marketing',
            'description' => "Strategizing in the digital realm. I leverage online channels to skyrocket your brand's visibility and drive conversions",
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
            'value' => 'My skills encompass versatile problem-solving, effective communication, and adept project management. I bring a dynamic skill set to any endeavor.',
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
            'value' => 'Explore a showcase of my diverse projects, where creativity meets functionality. Each endeavor reflects passion and precision in design and development.',
        ]);

        $this->createProjects($user);
    }


    public function createProjects($user)
    {
        $defaultProjectImages = (new DefaultImageService)->getProjectImages();
        Project::create([
            'title' => 'Digital Transformation Strategy',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[0],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Launching a dynamic marketing campaign to elevate brand visibility..</p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Elevate your business with a comprehensive digital transformation strategy.</li>
                    <li>Strategic analysis of current processes and identification of optimization opportunities.</li>
                    <li>Implementation of cutting-edge technologies to enhance operational efficiency.</li>
                    <li>Seamless integration of digital solutions tailored to meet your unique business goals.</li>
                </ul>
            ',
        ]);


        Project::create([
            'title' => 'Accelerated Marketing Campaign',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[1],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Craft a path to success by embracing a powerful digital transformation strategy. Our expert team conducts a thorough analysis of your current processes, identifying optimization opportunities.</p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Implement targeted social media strategies.</li>
                    <li>Create engaging content for diverse digital platforms.</li>
                    <li>Analyze campaign performance with advanced analytics tools.</li>
                    <li>Optimize strategies for maximum impact and audience reach.</li>
                    <li>Ensure seamless integration across all marketing channels.</li>
                    <li>Drive brand recognition and customer engagement to new heights.</li>
                </ul>
            ',
        ]);


        Project::create([
            'title' => 'E-commerce Website',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[2],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Transforming your online presence with a revamped e-commerce website. </p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Redesign user interface for enhanced customer experience.</li>
                    <li>Implement secure and seamless payment gateways.</li>
                    <li>Optimize website performance for faster loading times.</li>
                    <li>Integrate inventory management system for efficient operations.</li>
                    <li>Develop responsive design for cross-device compatibility.</li>
                    <li>Conduct rigorous testing to ensure a flawless user journey.</li>
                    <li>Elevate your online store to new heights of functionality and aesthetics.</li>
                </ul>
            ',
        ]);

        Project::create([
            'title' => 'Employee Training Platform',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[3],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Developing a comprehensive online training platform for employee skill. </p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Design user-friendly interface for easy navigation.</li>
                    <li>Implement interactive modules for engaging learning experiences.</li>
                    <li>Integrate progress tracking and assessment tools.</li>
                    <li>Ensure compatibility across various devices for flexible accessibility.</li>
                    <li>Incorporate multimedia elements to enhance content delivery.</li>
                    <li>Provide analytics for performance evaluation and continuous improvement.</li>
                    <li>Empower your workforce with a state-of-the-art training solution.</li>
                </ul>
            ',
        ]);

        Project::create([
            'title' => 'Sustainable Product Packaging',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[4],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Redefining your brand’s environmental impact through sustainable packaging design. </p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Conduct a comprehensive audit of current packaging materials.</li>
                    <li>Collaborate with eco-friendly suppliers for sustainable alternatives.</li>
                    <li>Design packaging that minimizes environmental footprint.</li>
                    <li>Communicate the brand’s commitment to sustainability through visuals.</li>
                    <li>Implement cost-effective solutions without compromising quality.</li>
                    <li>Promote eco-friendly practices and enhance brand reputation.</li>
                </ul>
            ',
        ]);

        Project::create([
            'title' => 'Mobile App Development',
            'user_id' => $user->id,
            'image' => $defaultProjectImages[5],
            'details' => '
                <p><strong>Project Info:</strong></p>
                <p>Creating a cutting-edge mobile app to promote health and wellness. </p>

                <p><strong>Project Details:</strong></p>
                <ul>
                    <li>Develop a user-friendly interface for seamless navigation.</li>
                    <li>Integrate health tracking features for personalized user insights.</li>
                    <li>Implement secure data storage and privacy measures.</li>
                    <li>Incorporate gamification elements for enhanced user engagement.</li>
                    <li>Collaborate with health experts for content creation and advice.</li>
                    <li>Conduct beta testing for user feedback and app optimization.</li>
                    <li>Empower users to take control of their well-being with a feature-rich mobile app.</li>
                </ul>
            ',
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
            'value' => 'Dive into a curated selection of courses designed to enhance skills and knowledge. Elevate my learning journey with transformative content and practical insights.',
        ]);
        $this->createCourse($user);
    }

    public function createCourse($user)
    {
        Course::create([
            'user_id' => $user->id,
            'title' => "Foundations of Digital Literacy",
            'details' => "Develop essential skills for navigating the digital landscape confidently. Learn about online safety, effective internet research, and basic digital tools to enhance your digital literacy.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => "Mastering Microsoft Office Suite",
            'details' => "Unlock the full potential of Microsoft Office tools - Word, Excel, and PowerPoint. From document creation to data analysis and impactful presentations, this course will make you a proficient Office user.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => "Spoken English for Everyday Communication",
            'details' => "Enhance your spoken English skills for effective communication in daily life. This course focuses on practical language use, helping you express yourself confidently in various situations.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => "Practical Computer Skills for Office and Home",
            'details' => "Acquire essential computer skills for both office and personal use. Learn to navigate the digital world, use common software applications, and manage files efficiently.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => "Social Media Marketing Essentials",
            'details' => "Dive into the world of social media marketing. This course covers the basics of creating a social media presence, content strategy, and effective promotion for personal or business use.",
        ]);
        Course::create([
            'user_id' => $user->id,
            'title' => "Introduction to Online Freelancing",
            'details' => "Explore the world of online freelancing. This course covers the basics of freelancing platforms, creating a compelling profile, and tips for success in the digital freelance marketplace.",
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
            'value' => 'Embark on a journey through my professional odyssey. A tapestry of challenges, growth, and achievements, showcasing a wealth of skills and expertise.',
        ]);
        $this->createExperience($user);
    }

    public function createExperience($user)
    {
        Experience::create([
            'user_id' => $user->id,
            'company' => 'TechInnovate Bangladesh',
            'role' => 'Senior Software Engineer',
            'details' => "Worked on cutting-edge projects, specializing in full-stack development. Collaborated with cross-functional teams to deliver innovative solutions.",
            'duration' => '2 Year',
            'year' => 2016,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'GreenScape Solutions Ltd.',
            'role' => 'UX/UI Designer',
            'details' => "Played a pivotal role in creating visually appealing and user-friendly interfaces. Successfully revamped the user experience of the company's flagship product.",
            'duration' => '1 Year',
            'year' => 2018,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'EcoTech Innovations Ltd.',
            'role' => 'Environmental Analyst',
            'details' => "Conducted comprehensive environmental impact assessments for various projects. Analyzed data to identify sustainable practices and recommend eco-friendly solutions.",
            'duration' => '6 Month',
            'year' => 2019,
        ]);
        Experience::create([
            'user_id' => $user->id,
            'company' => 'FinSmart Solutions Bangladesh',
            'role' => 'Financial Analyst',
            'details' => "Analyzed financial data to provide strategic insights for decision-making. Prepared detailed financial reports and forecasts, aiding in budget planning.",
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
            'value' => 'Celebrate milestones and triumphs in my journey. From impactful projects to industry recognition, each achievement is a testament to dedication and success.',
        ]);
        $this->createAchievement($user);
    }

    public function createAchievement($user)
    {
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Pioneer in Creativity',
            'details' => 'Honored with the prestigious Innovator of the Year Award for consistently pushing the boundaries of creativity and bringing fresh perspectives to projects. This achievement highlights a commitment to innovation and a passion for turning ideas into impactful solutions.',
        ]);
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Leadership Excellence Recognition',
            'details' => 'Recognized for outstanding leadership excellence, characterized by the ability to inspire, motivate, and guide teams towards achieving unprecedented success. This achievement reflects a commitment to fostering a positive and collaborative work environment while driving results.',
        ]);
        Achievement::create([
            'user_id' => $user->id,
            'title' => 'Community Impact Champion',
            'details' => 'Acknowledged as a Community Impact Champion for dedicated efforts in making a positive difference. This achievement showcases a commitment to social responsibility, community engagement, and the ability to leverage skills and resources to contribute meaningfully to the well-being of others.',
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
            'value' => 'Discover the academic chapters that shape my knowledge landscape. A culmination of learning experiences, degrees, and skills acquired on the educational journey.',
        ]);
        $this->createEducation($user);
    }

    public function createEducation($user)
    {
        Education::create([
            'user_id' => $user->id,
            'name' => 'S.S.C',
            'details' => '<p><strong>School</strong>: Ideal School &amp; College<br />
            <strong>Department</strong>: Science<br />
            <strong>Session</strong>: 2013-2014<br />
            <strong>GPA</strong>: 4.89</p>
            ',
        ]);
        Education::create([
            'user_id' => $user->id,
            'name' => 'H.S.C',
            'details' => '<p><strong>College</strong>: Dhaka College<br />
            <strong>Department</strong>: Science<br />
            <strong>Session</strong>: 2015-2016<br />
            <strong>GPA</strong>: 5.0</p>
            ',
        ]);
        Education::create([
            'user_id' => $user->id,
            'name' => 'Honours',
            'details' => '<p><strong>University</strong>: Cumilla University<br />
            <strong>Subject</strong>: Computer Science <br />
            <strong>Session</strong>: 2017-2018<br />
            <strong>CGPA</strong>: 3.69</p>
            ',
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
            'value' => 'Hear from satisfied clients and colleagues. Genuine words of endorsement, reflecting trust, collaboration, and the positive impact of our professional interactions.',
        ]);
        $this->createTestimonial($user);
    }

    public function createTestimonial($user)
    {
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Touhedul Islam',
            'designation' => 'Founder at Ratul tech',
            'message' => "Collaborating with this professional was an absolute pleasure. Commitment to excellence and attention to detail were truly commendable. Exceeded expectations and delivered exceptional results. Highly recommended for anyone seeking a dedicated and talented professional.",
        ]);
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Fayes Ahmed',
            'designation' => 'CEO at Amber IT',
            'message' => "Had the privilege of working with a standout professional on a project. Expertise displayed was unparalleled, demonstrating a profound understanding of the subject matter and an unwavering commitment to achieving success. This individual is a valuable asset to any team or project.",
        ]);
        Testimonial::create([
            'user_id' => $user->id,
            'name' => 'Torikul Islam',
            'designation' => 'CTO at Snow Fleak',
            'message' => "Can't speak highly enough about the experience of working with a remarkable professional. Creativity, professionalism, and the ability to think outside the box set this person apart. Not only met but exceeded expectations. Wouldn't hesitate to recommend for anyone looking for a skilled and dedicated professional.",
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
            'value' => 'Reach out effortlessly. Find my contact details for inquiries, collaborations, or just to say hello. I look forward to connecting with you!',
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
