<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {

            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('title');
            $table->string('main_image_path');
            $table->mediumtext('description');
            $table->integer('productcategory_id');

            $table->boolean('is_active');
            $table->boolean('add_shema');

            $table->string('meta_description');
            $table->string('meta_keys');
            $table->string('slug');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
