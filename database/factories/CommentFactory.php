<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        return [
            
            'product_id' =>rand(20,100),
            'user_id' =>rand(1,5),
            'text' => $this->faker->text(),
        ];
    }
}
