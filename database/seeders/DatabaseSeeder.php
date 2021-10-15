<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create()->each(function ($user) {
        //     $user->post()->save(\App\Models\Post::factory()->make());
        // });
        // \App\Models\User::factory(10)->create()->each(function ($user) {
        //     $user->posts()->save(\App\Models\Post::factory()->make());
        // });

        User::factory()
            ->count(10)
            ->create();
    }
}
