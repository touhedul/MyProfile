<?php

namespace App\Providers;
use App\Models\User;

use App\Models\ProfessionCategory;
use App\Models\Admin;
use App\Models\UserMenu;
use Illuminate\Support\ServiceProvider;
use Spatie\Permission\Models\Role;
use View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.custom_domains.fields'], function ($view) {
            $userItems = User::pluck('name','id')->toArray();
            $view->with('userItems', $userItems);
        });
        View::composer(['admin.professions.fields'], function ($view) {
            $profession_categoryItems = ProfessionCategory::pluck('name','id')->toArray();
            $view->with('profession_categoryItems', $profession_categoryItems);
        });
        View::composer(['admin.admins.fields'], function ($view) {
            $roles = Role::where('name','!=','super-admin')->where('name','!=','user')->get();
            $view->with('roles', $roles);
        });
    }
}
