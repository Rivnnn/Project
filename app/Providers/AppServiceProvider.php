<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\AppServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider as SupportServiceProvider;

class AppServiceProvider extends SupportServiceProvider
{
    public const HOME = '/dashboard';

    public function boot()
    {
        // // $this->configureRateLimiting();

        // $this->routes(function () {
        //     Route::middleware('web')
        //         ->namespace($this->namespace)
        //         ->group(base_path('routes/web.php'));

        //     Route::middleware('api')
        //         ->namespace($this->namespace)
        //         ->group(base_path('routes/api.php'));
        // });
    }

    protected function redirectTo()
    {
        $role = Auth::user()->role;

        switch ($role) {
            case 'admin':
                return 'admin/dashboard';
            case 'seller':
                return 'seller/dashboard';
            default:
                return 'dashboard/dashboard';
        }
    }
}