<?php

namespace App\Providers;

use App\Observers\UserObserver;
use App\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
//        Paginator::defaultView('vendor.pagination.default');
//        Paginator::defaultSimpleView('vendor.pagination.default');
//        Paginator::useTailwind();
//        Schema::defaultStringLength(191);
        User::observe(UserObserver::class);
    }
}
