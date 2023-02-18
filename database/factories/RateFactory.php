<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {




        return [
    
            'rate' =>rand(1,5),
            'product_id' =>rand(20,100),

        ];
   
   
   
   


   
   
   
    }
}
