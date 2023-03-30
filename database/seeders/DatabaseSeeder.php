<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Comment;
use App\Models\ProductCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //\App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $this->call([RoleSeeder::class, PhotoSeeder::class, UsersTableSeeder::class,UsersRolesTableSeeder::class,CategorySeeder::class,PostSeeder::class,PostCategorySeed::class,
         CommentSeeder::class, KeywordsTableSeeder::class, BrandSeeder::class, ProductSeeder::class, ProductCategorySeeder::class, Product_ProductCategorySeeder::class]);
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
