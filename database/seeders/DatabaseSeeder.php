<?php

use App\Models\Notification;
use App\Models\User;
use Database\Seeders\MenuProfessionSeeder;
use Database\Seeders\MenuSeeder;
use Database\Seeders\ProfessionCategorySeeder;
use Database\Seeders\ProfessionSeeder;
use Database\Seeders\SettingSeeder;
use Database\Seeders\UserSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MenuSeeder::class);
        $this->call(ProfessionCategorySeeder::class);
        $this->call(ProfessionSeeder::class);
        $this->call(UserSeeder::class);
        // $this->call(MenuProfessionSeeder::class);
    }
}
