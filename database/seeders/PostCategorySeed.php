<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::all();
        Post::all()->each(function($post) use ($categories) {
            $post->categories()->attach(
                $categories->pluck('id')->random(rand(1, $categories->count()))->toArray()
            );
        });
    }
}
