<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $array= ['Yangon', 'Mandalay', 'Bagan', 'Pyay', 'Shan'];
        return [
            'title'=>$this->faker->sentence($nbWords=8),
            'description'=>$this->faker->text($maxNbChars=200),
            'price'=>rand(2000,5000),
            'address'=>$array[array_rand($array)],
            'rating'=>rand(0,5),
        ];
    }
}
