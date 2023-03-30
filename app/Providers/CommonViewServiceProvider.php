<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;

class CommonViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer(['home', 'post','category'], function ($view) {
            $postsTickers = Post::latest('created_at')->take(6)->get();
            $categories = Category::all();

            $view->with('postsTickers', $postsTickers);
            $view->with('categories', $categories);
        });

    }
}


