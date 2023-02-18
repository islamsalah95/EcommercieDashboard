<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {


        
        $arraysize = [100,50,30,10,99,1,2];

        $arraycategory_id = [1, 2, 3];

        $arrayprice = [1000,500,3000,100,959,188,269];

        $arrayimg= ["http://127.0.0.1:8000/assets/images/casual.png","http://127.0.0.1:8000/assets/images/casual.png","http://127.0.0.1:8000/assets/images/casua2.png","http://127.0.0.1:8000/assets/images/casua3.png","http://127.0.0.1:8000/assets/images/casua10.png"];


        
        return [
    
            'name' => $this->faker->name(),
            'price' => Arr::random($arrayprice),
            'desc' => $this->faker->text(),
            'img1' =>  Arr::random($arrayimg),
            'img2' =>  Arr::random($arrayimg),
            'img3' =>  Arr::random($arrayimg),
            'xl' =>  Arr::random($arraysize),
            'xxl' =>  Arr::random($arraysize),
            'xxxl' =>  Arr::random($arraysize),
            'category_id' =>  3,

        ];
    }
}
