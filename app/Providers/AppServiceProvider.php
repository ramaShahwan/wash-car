<?php

namespace App\Providers;
use App\Models\Page;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\FooterController;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
   
        public function boot()
        {
            // View::composer('site.layouts.footer', function ($view) {
            //     $all_pinned_page = Page::all();
            //     $view->with('all_pinned_page', $all_pinned_page);
            // });
        }
    

    // public function boot()
    // {
    //     Schema::defaultStringLength(191);
    //     Paginator::useBootstrap();
    //     Paginator::defaultView('vendor.pagination.custom_dashboard');
    // }
}
