<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\DB;

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
        $newMitraRequests = DB::table('users')->whereNull('status')->count();
        $newOrders = DB::table('pemesanan')->whereNull('status')->count();

        View::share('newMitraRequests', $newMitraRequests);
        View::share('newOrders', $newOrders);
    }
}