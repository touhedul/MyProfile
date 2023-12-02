<?php

namespace Database\Seeders;

use App\Models\MenuProfession;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menuProfession = [
            ['profession_id' => 1,'menu_id' => 1],
        ];

        $menuProfession = array_map(function ($item) {
            $item['created_at'] = now();
            $item['updated_at'] = now();
            return $item;
        }, $menuProfession);

        MenuProfession::insert($menuProfession);
    }
}
