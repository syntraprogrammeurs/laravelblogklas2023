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
        //Post::factory()->count(5000)->create();
        $chunkSize = 1000;
        $postCount = 5000;

        $posts = Post::factory()->count($postCount)->make();
        $chunks =array_chunk($posts->toArray(), $chunkSize);

        foreach($chunks as $chunk){
            Post::insert($chunk);
        }
    }
}
