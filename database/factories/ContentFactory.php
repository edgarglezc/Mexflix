<?php

namespace Database\Factories;

use App\Models\Content;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Content::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $is_serie = $this->faker->numberBetween(0,1);
        $link_path = "https://www.youtube.com/embed/DPAL7DHwN9Q";
        if($is_serie){
            $link_path = "";
        }
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'duration' => $this->faker->randomNumber(3, true),
            'year' => $this->faker->regexify('[0-9]{4}'),
            'is_serie' => $is_serie,
            'seasons' => 0,
            'image_path' => "https://hips.hearstapps.com/es.h-cdn.co/fotoes/images/peliculas/interstellar/posters/18799170-1-esl-ES/Posters.jpg",            
            'link_path' => $link_path,            
            'updated_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}