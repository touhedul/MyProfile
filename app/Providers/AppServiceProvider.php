<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Opcodes\LogViewer\Facades\LogViewer;
use Schema;

class AppServiceProvider extends ServiceProvider
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
        // Model::preventLazyLoading(! app()->isProduction());
        Schema::defaultStringLength(190);
        LogViewer::auth(function ($request) {
            return $request->user()
                && in_array($request->user()->email, [
                    'admin@admin.com',
                ]);
        });
    }
}
