<?php

namespace Database\Seeders;

use App\Models\Content;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        $json = File::get("database/data/contents.json");
        $data = json_decode($json);
        foreach($data as $content){
            Content::create(array(
                'name' => $content->name,
                'description' => $content->description,
                'duration' => $content->duration,
                'year' => $content->duration,
                'is_serie' => $content->is_serie,
                'seasons' => $content->seasons,
                'image_path' => $content->image_path,
                'link_path' => $content->link_path
            ));
        }
    }
}
