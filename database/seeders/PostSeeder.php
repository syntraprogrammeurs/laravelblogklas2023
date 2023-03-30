<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $chunkSize = 100;
        $postCount = 500;

        $posts = Post::factory()->count($postCount)->make();
        $chunks = array_chunk($posts->toArray(), $chunkSize);

        foreach ($chunks as $chunk) {
            Post::insert($chunk);
        }
    }
}
