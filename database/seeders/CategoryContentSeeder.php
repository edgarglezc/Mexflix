<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Http\Controllers\ContentController;
use Illuminate\Support\Facades\File;

class CategoryContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/categorycontent.json");
        $data = json_decode($json);
        foreach($data as $catcont){
            ContentController::addCategorySeeder($catcont->content_id, $catcont->category_id);
        }
    }
}
