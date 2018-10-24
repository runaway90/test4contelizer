<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beer', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('brewer_id');

            $table->string('name');
            $table->string('country');
            $table->string('type');

            $table->string('image_url');

            $table->integer('quantity');
            $table->integer('volume_of_unit');

            $table->float('price');
            $table->float('price_per_litre');

            $table->timestampsTz();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('beer');
    }

}
