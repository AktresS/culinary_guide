<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Dish;
use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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
        Paginator::defaultView('pagination::default');

        Gate::define('create-category', function (User $user) {
            return $user->role == 1;
        });

        Gate::define('delete-category', function (User $user) {
            return $user->role == 1;
        });

        Gate::define('create-dish', function (User $user){
            return true;
        });

    }
}
