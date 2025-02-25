<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

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
    public function boot(): void
    {
        Blade::directive('AdminAuth', function () {
            return "<?php if(auth()->check() && auth()->user()->hasRole('Admin')): ?>";
        });

         // Custom Blade directive for ending the @AdminAuth block
         Blade::directive('endAdminAuth', function () {
            return "<?php endif; ?>";
        });

    }
}
