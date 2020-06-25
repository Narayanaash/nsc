<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use DB;

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
        View::composer('admin/layouts/*', function ($view) {
            $category_for_app = DB::table('category')->get();
            $view->with('category_for_app', $category_for_app);
        });

        View::composer(['frontend/pages/404', 'frontend/pages/500'], function ($view) {
            $category_to_index_category = DB::table('category')->get();
            $view->with('category_to_index_category', $category_to_index_category);
        });
    }
}
