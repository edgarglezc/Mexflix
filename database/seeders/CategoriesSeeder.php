<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/categories.json");
        $data = json_decode($json);
        foreach($data as $category){
            Category::create(array(                
                'name' => $category->name,                
            ));
        }
    }          
}
