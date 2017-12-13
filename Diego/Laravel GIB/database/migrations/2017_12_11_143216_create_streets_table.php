<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStreetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('streets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('num_from');
            $table->integer('num_to');
            $table->string('state');
            $table->integer('locationes_id')->unsigned();
            $table->foreign('locationes_id')->references('id')->on('locationes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('streets');
    }
}
