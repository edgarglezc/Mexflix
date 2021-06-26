<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TestChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Chapter::factory(100)->create();
    }
}
