<?php

namespace Database\Seeders;

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
        $this->call([
            UsersSeeder::class,
            CategoriesSeeder::class,
            ContentsSeeder::class,
            SeasonsSeeder::class,
            ChaptersSeeder::class,
            CategoryContentSeeder::class,
        ]);
    }
}
