<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseTestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            TestCategoriesSeeder::class,
            TestContentsSeeder::class,
            TestSeasonsSeeder::class,
            TestChaptersSeeder::class
        ]);
    }
}
