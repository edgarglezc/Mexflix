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
            'description' => $this->faker->sentence(),
            'chapters' => $this->faker->numberBetween(5, 20),
            'image_path' => $this->faker->regexify('http://[a-z]{10}\.com'),
            'created_at' => $this->faker->date() . $this->faker->time(),
        ];
    }
}