<?php

namespace Database\Seeders;

use App\Models\ProfessionCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //! changing the name or position of the categories will effect on profession and menus

        $professionCategories = [
            ['name' => 'Freelancers'],
            ['name' => 'Creative Professionals'],
            ['name' => 'Consultants and Coaches'],
            ['name' => 'Entrepreneurs'],
            ['name' => 'Professionals in the Tech Industry'],
            ['name' => 'Healthcare Professionals:'],
            ['name' => 'Educators'],
            ['name' => 'Real Estate Professionals:'],
            ['name' => 'Authors and Writers:'],
            ['name' => 'Event Planners:'],
            ['name' => 'Legal Professionals:'],
            ['name' => 'Financial Advisors:'],
            ['name' => 'Scientists and Researchers:'],
            ['name' => 'Public Speakers:'],
            ['name' => 'Medical and Wellness Professionals:'],
            ['name' => 'Marketing and PR Professionals:'],
            ['name' => 'Human Resources Professionals:'],
            ['name' => 'Social Media Influencers:'],
            ['name' => 'Nonprofit Organizations:'],
            ['name' => 'Engineer'],
            ['name' => 'Students and Job Seekers:'],
            ['name' => 'Digital Marketers:'],
        ];

        $professionCategories = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $professionCategories);

        ProfessionCategory::insert($professionCategories);
    }
}
