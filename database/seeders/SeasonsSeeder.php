<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class SeasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = File::get("database/data/seasons.json");
        $data = json_decode($json);
        foreach($data as $season){
            Season::create(array(                
                'id' => $season->id,
                'content_id' => $season->content_id,
                'season' => $season->season,
                'description' => $season->description,
                'year' => $season->year,
                'chapters' => $season->chapters,
                'image_path' => $season->image_path,
            ));
        }
    }
}
