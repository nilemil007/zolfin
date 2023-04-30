<?php

namespace App\Providers;

use App\View\Components\Backend\AppLayout;
use App\View\Components\Zolfin\MainLayout;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class BladeServiceProvider extends ServiceProvider
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
        Blade::components([
            MainLayout::class => 'main-layout',
            AppLayout::class => 'app-layout',
        ]);
    }
}
