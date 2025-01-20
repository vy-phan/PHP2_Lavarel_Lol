<?php

namespace App\Providers;

use App\Models\DangKyTuyenSinh;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        // Đăng ký alias cho component client
        Blade::component('layout.client', 'client-layout');

        // Đăng ký alias cho component admin
        Blade::component('layout.admin', 'admin-layout');

        Schema::defaultStringLength(191);
    }
}
