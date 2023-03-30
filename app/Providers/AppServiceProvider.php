<?php

namespace App\Providers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Pagination\Paginator;
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
        //
        //Paginator::useBootstrapFive();
        Paginator::useBootstrapFour();
//
        $usersCount = User::count();
        $postsCount = Post::count();

        view()->share('usersCount', $usersCount);
        view()->share('postsCount', $postsCount);
    }
}
