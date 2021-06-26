<?php

namespace Database\Factories;

use App\Models\Chapter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChapterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Chapter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'season_id' => $this->faker->numberBetween(1,50),
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'duration' => $this->faker->randomNumber(2, true),
            'link_path' => $this->faker->regexify('http://[a-z]{10}\.com'),
            'updated_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}
