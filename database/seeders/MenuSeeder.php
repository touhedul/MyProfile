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
            ['name' => 'Home','status'=>1],//
            ['name' => 'About','status'=>1],//
            ['name' => 'Skill','status'=>1],//
            ['name' => 'Service','status'=>1],//
            ['name' => 'Project','status'=>1],//
            ['name' => 'Course','status'=>0],
            ['name' => 'Achievement','status'=>0],
            ['name' => 'Experience','status'=>1],//
            ['name' => 'Education','status'=>1],//
            ['name' => 'Testimonial','status'=>0],
            ['name' => 'Client','status'=>0],
            ['name' => 'Contact','status'=>1],//
        ];

        $menus = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $menus);
        Menu::insert($menus);
    }
}
