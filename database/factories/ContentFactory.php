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
        $seasons = 0;
        if($is_serie){
            $seasons = $this->faker->numberBetween(1,10);
        }
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->sentence(),
            'duration' => $this->faker->randomNumber(3, true),
            'year' => $this->faker->regexify('[0-9]{4}'),
            'is_serie' => $is_serie,
            'seasons' => $seasons,
            'image_path' => $this->faker->regexify('http://[a-z]{10}\.com'),
            'link_path' => $this->faker->regexify('http://[a-z]{10}\.com'),
            'created_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}
