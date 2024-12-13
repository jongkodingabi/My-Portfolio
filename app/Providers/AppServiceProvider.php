<?php

namespace App\Providers;

use App\Models\FormContact;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
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
        View::composer('components.navbar-admin', function ($view) {
    
            if (Auth::check()) {
                $totalContacts = FormContact::all();
            }
    
            $view->with('totalContacts', $totalContacts);
        });

    }
}
