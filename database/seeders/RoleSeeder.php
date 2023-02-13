<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table("roles")->insert([
            "name" => "administrator",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        DB::table("roles")->insert([
            "name" => "author",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
        DB::table("roles")->insert([
            "name" => "subscriber",
            "created_at" => now(),
            "updated_at" => now(),
        ]);
//        Role::factory()
//            ->count(5)
//            ->create();
    }
}
