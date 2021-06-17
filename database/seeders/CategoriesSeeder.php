<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([ 'name' => 'Terror' ]);
        DB::table('categories')->insert([ 'name' => 'Comedia' ]);
        DB::table('categories')->insert([ 'name' => 'Romance' ]);
        DB::table('categories')->insert([ 'name' => 'Ficción' ]);
        DB::table('categories')->insert([ 'name' => 'Acción' ]);
        DB::table('categories')->insert([ 'name' => 'Musical' ]);
        DB::table('categories')->insert([ 'name' => 'Drama' ]);
        DB::table('categories')->insert([ 'name' => 'Aventura' ]);        
        DB::table('categories')->insert([ 'name' => 'Ciencia Ficción' ]);
        DB::table('categories')->insert([ 'name' => 'Fantasía' ]);
        DB::table('categories')->insert([ 'name' => 'Suspenso' ]);        
    }
}
