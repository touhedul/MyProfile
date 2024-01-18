<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            ['name' => 'Home','status'=>1,'background_color' => null],

            ['name' => 'About','status'=>1,'background_color' => '#ffffff'],

            ['name' => 'Skill','status'=>1,'background_color' => '#f8f9fa'],

            ['name' => 'Service','status'=>1,'background_color' => '#ffffff'],

            ['name' => 'Project','status'=>1,'background_color' => '#f8f9fa'],

            ['name' => 'Course','status'=>1,'background_color' => '#ffffff'],
            ['name' => 'Achievement','status'=>1,'background_color' => '#f8f9fa'],
            ['name' => 'Experience','status'=>1,'background_color' => '#ffffff'],

            ['name' => 'Education','status'=>1,'background_color' => '#f8f9fa'],

            ['name' => 'Testimonial','status'=>1,'background_color' => '#ffffff'],
            ['name' => 'Client','status'=>1,'background_color' => '#f8f9fa'],
            ['name' => 'Contact','status'=>1,'background_color' => '#ffffff'],

        ];

        $menus = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $menus);
        Menu::insert($menus);
    }
}
