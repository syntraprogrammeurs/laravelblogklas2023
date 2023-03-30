<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $userIds = User::pluck('id')->toArray();
        $photoIds =  Photo::pluck('id')->toArray();
        $title = fake()->sentence();
        $slug = Str::slug($title, '-');


        return [
            //
            'user_id' => fake()->randomElement($userIds),
            'photo_id' => fake()->randomElement($photoIds),
            'title' => $title,
            'slug'=> $slug,
            'body'=> fake()->paragraph(100,true)
        ];
    }
}
