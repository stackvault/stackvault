<?php

namespace App\Providers;

use App\EmailVerificationCode;
use App\Observers\EmailVerificationCodeObserver;
use App\Observers\PageObserver;
use App\Page;
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
        Page::observe(PageObserver::class);
        EmailVerificationCode::observe(EmailVerificationCodeObserver::class);
        view()->composer('layouts.nav', function ($view) {
            $view->with('navLinks', app()->getNavLinks());
        });
    }
}
