<?php

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
            $table->increments('id');

            $table->integer('import_id')->unsigned()->index()->nullable();
            $table->foreign('import_id')->references('id')->on('imports');

            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('lm')->unique();
            $table->string('name');
            $table->string('category');
            $table->boolean('free_shipping')->default(false);
            $table->string('description')->nullable();
            $table->float('price');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
