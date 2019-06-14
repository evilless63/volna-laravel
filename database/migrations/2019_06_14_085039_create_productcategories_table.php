<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductcategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();

            $table->string('title');
            $table->mediumtext('description');
            $table->string('short_description');
            $table->string('image_path');

            $table->integer('productcategory_id')->nulled();

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
        Schema::dropIfExists('productcategories');
    }
}
