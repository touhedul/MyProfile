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
        ];

        $professions = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $professions);

        Profession::insert($professions);
    }
}
