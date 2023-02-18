<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string("name");
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     *      * php artisan migrate --path=database\migrations\2014_10_12_000000_create_users_table.php
     * 
     *      * php artisan migrate --path=database\migrations\2023_01_17_025918_create_categories_table.php

          * php artisan migrate --path=database\migrations\2023_01_17_025837_create_products_table.php

               * php artisan migrate --path=database\migrations\2023_01_17_030023_create_comments_table.php

                    * php artisan migrate --path=database\migrations\2023_01_17_030023_create_carts_table.php

                         * php artisan migrate --path=database\migrations\2023_01_17_030053_create_orders_table.php
                         * 
                          * php artisan migrate --path=database\migrations\2023_01_18_230535_create_rates_table.php


     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
