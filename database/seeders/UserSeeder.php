<?php

namespace Database\Seeders;

use App\Models\User;
use App\Services\UserService;
use Illuminate\Database\Seeder;
use Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = User::role('customer')->get();
        $userService = new UserService();
        foreach($customers as $customer){
            $userService->createUserInfo($customer);
            $customer->update(['has_profile'=>1]);
        }
    }
}
