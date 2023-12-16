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
            ['name' => 'Graphic Designers','profession_category_id'=>1],
            ['name' => 'Web Developers','profession_category_id'=>1],
            ['name' => 'Writers and Copywriters','profession_category_id'=>1],
            ['name' => 'Photographers','profession_category_id'=>1],
            ['name' => 'Video Editors','profession_category_id'=>1],

            ['name' => 'Artists','profession_category_id'=>2],
            ['name' => 'Musicians','profession_category_id'=>2],
            ['name' => 'Actors','profession_category_id'=>2],
            ['name' => 'Filmmakers','profession_category_id'=>2],

            ['name' => 'Business Consultants','profession_category_id'=>3],
            ['name' => 'Life Coaches','profession_category_id'=>3],
            ['name' => 'Career Advisors','profession_category_id'=>3],
            ['name' => 'Fitness Trainers','profession_category_id'=>3],

            ['name' => 'Startup Founders','profession_category_id'=>4],
            ['name' => 'Small Business Owners','profession_category_id'=>4],
            ['name' => 'Solopreneurs','profession_category_id'=>4],

            ['name' => 'Software Engineers','profession_category_id'=>5],
            ['name' => 'Data Scientists','profession_category_id'=>5],
            ['name' => 'Product Managers','profession_category_id'=>5],

            ['name' => 'Doctors','profession_category_id'=>6],
            ['name' => 'Dentists','profession_category_id'=>6],
            ['name' => 'Therapists','profession_category_id'=>6],

            ['name' => 'Teachers','profession_category_id'=>7],
            ['name' => 'Professors','profession_category_id'=>7],
            ['name' => 'Online Course Instruct','profession_category_id'=>7],

            ['name' => 'Realtors','profession_category_id'=>8],
            ['name' => 'Property Managers','profession_category_id'=>8],

            ['name' => 'Authors','profession_category_id'=>9],
            ['name' => 'Bloggers','profession_category_id'=>9],
            ['name' => 'Journalists','profession_category_id'=>9],

            ['name' => 'Wedding Planners','profession_category_id'=>10],
            ['name' => 'Event Coordinators','profession_category_id'=>10],

            ['name' => 'Lawyers','profession_category_id'=>11],
            ['name' => 'Legal Consultants','profession_category_id'=>11],

            ['name' => 'Accountants','profession_category_id'=>12],
            ['name' => 'Financial Planners','profession_category_id'=>12],

            ['name'=>'Scientists','profession_category_id'=>13],
            ['name'=>'Researchers','profession_category_id'=>13],

            ['name'=>'Motivational Speakers','profession_category_id'=>14],
            ['name'=>'Keynote Speakers','profession_category_id'=>14],

            ['name'=>'Nutritionists','profession_category_id'=>15],
            ['name'=>'Yoga Instructors','profession_category_id'=>15],
            ['name'=>'Personal Trainers','profession_category_id'=>15],

            ['name'=>'Marketing Consultants','profession_category_id'=>16],
            ['name'=>'PR Specialists','profession_category_id'=>16],

            ['name'=>'HR Consultants','profession_category_id'=>17],
            ['name'=>'Recruiters','profession_category_id'=>17],

            ['name'=>'Content Creators','profession_category_id'=>18],
            ['name'=>'Social Media Influencers','profession_category_id'=>18],

            ['name'=>'Founders','profession_category_id'=>19],
            ['name'=>'NGO Representatives','profession_category_id'=>19],

            ['name'=>'Graduates','profession_category_id'=>20],
            ['name'=>'Student','profession_category_id'=>20],
            ['name'=>'Teacher','profession_category_id'=>20],
            ['name'=>'Job seekers','profession_category_id'=>20],

            ['name'=>'SEO Experts','profession_category_id'=>21],
            ['name'=>'Social Media Managers','profession_category_id'=>21],
            ['name'=>'Content Marketers','profession_category_id'=>21],

            ['name'=>'Architects and Designers','profession_category_id'=>22],
            ['name'=>'Travel Bloggers','profession_category_id'=>22],
            ['name'=>'Virtual Assistants','profession_category_id'=>22],
            ['name'=>'Public Relations Professionals','profession_category_id'=>22],
            ['name'=>'IT Consultants','profession_category_id'=>22],
            ['name'=>'Language Coaches','profession_category_id'=>22],
            ['name'=>'Interior Designers','profession_category_id'=>22],
            ['name'=>'Sales Professionals','profession_category_id'=>22],
            ['name'=>'Environmental Consultants','profession_category_id'=>22],
            ['name'=>'UX/UI Designers','profession_category_id'=>22],
            ['name'=>'Financial Analysts','profession_category_id'=>22],
            ['name'=>'Wedding Photographers','profession_category_id'=>22],
            ['name'=>'Event Planners','profession_category_id'=>22],
            ['name'=>'Virtual Event Organizers','profession_category_id'=>22],
            ['name'=>'Customer Service Professionals','profession_category_id'=>22],
            ['name'=>'Blockchain Developers','profession_category_id'=>22],
            ['name'=>'E-commerce Entrepreneurs','profession_category_id'=>22],
            ['name'=>'Online Merchants','profession_category_id'=>22],
            ['name'=>'Virtual Assistants','profession_category_id'=>22],
            ['name'=>'Software Developers','profession_category_id'=>22],
        ];

        $professions = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $professions);

        Profession::insert($professions);


    }
}
