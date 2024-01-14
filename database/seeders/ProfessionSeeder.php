<?php

namespace Database\Seeders;

use App\Models\Profession;
use App\Models\ProfessionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $professions = [
            ['name' => 'Graphic Designer','profession_category_id'=>1],
            ['name' => 'Web Developer','profession_category_id'=>1],
            ['name' => 'Writers and Copywriter','profession_category_id'=>1],
            ['name' => 'Photographer','profession_category_id'=>1],
            ['name' => 'Video Editor','profession_category_id'=>1],

            ['name' => 'Artist','profession_category_id'=>2],
            ['name' => 'Musician','profession_category_id'=>2],
            ['name' => 'Actor','profession_category_id'=>2],
            ['name' => 'Filmmaker','profession_category_id'=>2],

            ['name' => 'Business Consultant','profession_category_id'=>3],
            ['name' => 'Life Coache','profession_category_id'=>3],
            ['name' => 'Career Advisor','profession_category_id'=>3],
            ['name' => 'Fitness Trainer','profession_category_id'=>3],

            ['name' => 'Startup Founder','profession_category_id'=>4],
            ['name' => 'Small Business Owner','profession_category_id'=>4],
            ['name' => 'Solopreneur','profession_category_id'=>4],

            ['name' => 'Software Engineer','profession_category_id'=>5],
            ['name' => 'Data Scientist','profession_category_id'=>5],
            ['name' => 'Product Manager','profession_category_id'=>5],

            ['name' => 'Doctor','profession_category_id'=>6],
            ['name' => 'Dentist','profession_category_id'=>6],
            ['name' => 'Therapist','profession_category_id'=>6],

            ['name' => 'Teacher','profession_category_id'=>7],
            ['name' => 'Professor','profession_category_id'=>7],
            ['name' => 'Online Course Instruct','profession_category_id'=>7],

            ['name' => 'Realtor','profession_category_id'=>8],
            ['name' => 'Property Manager','profession_category_id'=>8],

            ['name' => 'Author','profession_category_id'=>9],
            ['name' => 'Blogger','profession_category_id'=>9],
            ['name' => 'Journalist','profession_category_id'=>9],

            ['name' => 'Wedding Planner','profession_category_id'=>10],
            ['name' => 'Event Coordinator','profession_category_id'=>10],

            ['name' => 'Lawyer','profession_category_id'=>11],
            ['name' => 'Legal Consultant','profession_category_id'=>11],

            ['name' => 'Accountant','profession_category_id'=>12],
            ['name' => 'Financial Planner','profession_category_id'=>12],

            ['name'=>'Scientist','profession_category_id'=>13],
            ['name'=>'Researcher','profession_category_id'=>13],

            ['name'=>'Motivational Speaker','profession_category_id'=>14],
            ['name'=>'Keynote Speaker','profession_category_id'=>14],

            ['name'=>'Nutritionist','profession_category_id'=>15],
            ['name'=>'Yoga Instructor','profession_category_id'=>15],
            ['name'=>'Personal Trainer','profession_category_id'=>15],

            ['name'=>'Marketing Consultant','profession_category_id'=>16],
            ['name'=>'PR Specialist','profession_category_id'=>16],

            ['name'=>'HR Consultant','profession_category_id'=>17],
            ['name'=>'Recruiter','profession_category_id'=>17],

            ['name'=>'Content Creator','profession_category_id'=>18],
            ['name'=>'Social Media Influencer','profession_category_id'=>18],

            ['name'=>'Founder','profession_category_id'=>19],
            ['name'=>'NGO Representative','profession_category_id'=>19],

            ['name'=>'Graduate','profession_category_id'=>20],
            ['name'=>'Student','profession_category_id'=>20],
            ['name'=>'Teacher','profession_category_id'=>20],
            ['name'=>'Job seeker','profession_category_id'=>20],

            ['name'=>'SEO Expert','profession_category_id'=>21],
            ['name'=>'Social Media Manager','profession_category_id'=>21],
            ['name'=>'Content Marketer','profession_category_id'=>21],

            ['name'=>'Architects and Designer','profession_category_id'=>22],
            ['name'=>'Travel Blogger','profession_category_id'=>22],
            ['name'=>'Virtual Assistant','profession_category_id'=>22],
            ['name'=>'Public Relations Professional','profession_category_id'=>22],
            ['name'=>'IT Consultant','profession_category_id'=>22],
            ['name'=>'Language Coache','profession_category_id'=>22],
            ['name'=>'Interior Designer','profession_category_id'=>22],
            ['name'=>'Sales Professional','profession_category_id'=>22],
            ['name'=>'Environmental Consultant','profession_category_id'=>22],
            ['name'=>'UX/UI Designer','profession_category_id'=>22],
            ['name'=>'Financial Analyst','profession_category_id'=>22],
            ['name'=>'Wedding Photographer','profession_category_id'=>22],
            ['name'=>'Event Planner','profession_category_id'=>22],
            ['name'=>'Virtual Event Organizer','profession_category_id'=>22],
            ['name'=>'Customer Service Professional','profession_category_id'=>22],
            ['name'=>'Blockchain Developer','profession_category_id'=>22],
            ['name'=>'E-commerce Entrepreneur','profession_category_id'=>22],
            ['name'=>'Online Merchant','profession_category_id'=>22],
            ['name'=>'Virtual Assistant','profession_category_id'=>22],
            ['name'=>'Software Developer','profession_category_id'=>22],
        ];

        $professions = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $professions);

        Profession::insert($professions);


    }
}
