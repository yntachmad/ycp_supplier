<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class GuestServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
        // if (!Auth::check()) {
        //     $userClass = config('auth.providers.users.model');
        //     Auth::setUser(new $userClass());
        // }
    }
}
