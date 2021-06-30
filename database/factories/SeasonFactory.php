<?php

namespace Database\Factories;

use App\Models\Season;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\Factory;

class SeasonFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Season::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $content_id = 0;
        $flag = true;
        while($flag){
            $random = $this->faker->numberBetween(1,50);
            $content = DB::table('contents')->where('id', $random)->get();            
            if($content[0]->is_serie == true){
                $flag = false;
                $content_id = $random;
            }
        }
        return [
            'content_id' => $content_id,
            'season' => $this->faker->numberBetween(1,15),
            'description' => $this->faker->sentence(),
            'year' => $this->faker->regexify('[0-9]{4}'),
            'chapters' => 0,
            'image_path' => "https://hips.hearstapps.com/es.h-cdn.co/fotoes/images/peliculas/interstellar/posters/18799170-1-esl-ES/Posters.jpg",
            'created_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}