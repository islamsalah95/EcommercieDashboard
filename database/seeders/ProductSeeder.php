<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.php artisan db:seed --class=ProductSeeder


     *
     * @return void
     */
    public function run()
    {
        Product::factory()
        ->count(3)
        ->hascategory_id(1)
        ->create();
    }
}
