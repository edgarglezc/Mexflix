<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestSeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Season::factory(50)->create();
    }
}
