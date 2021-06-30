<?php

namespace Database\Seeders;

use App\Models\Chapter;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ChaptersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/chapters.json");
        $data = json_decode($json);
        foreach($data as $chapter){
            Chapter::create(array(                
                "id" => $chapter->id,
                "season_id" => $chapter->season_id,
                "chapter" => $chapter->chapter,
                "name" => $chapter->name,
                "description" => $chapter->description,
                "duration" => $chapter->duration,
                "link_path" => $chapter->link_path
            ));
        }
    }
}
