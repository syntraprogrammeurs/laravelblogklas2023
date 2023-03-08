<?php

namespace Database\Factories;

use App\Models\Photo;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
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
        $photoIds = Photo::pluck('id')->toArray();
        return [
            //
            'user_id'=>fake()->randomElement($userIds),
            'photo_id'=>fake()->randomElement($photoIds),
            'title'=> fake()->sentence(),
            'body'=> fake()->paragraph(),
        ];
    }
}
