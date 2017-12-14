<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('lastname');
            $table->integer('age');
            $table->string('gender');
            $table->DateTime('date_age');
            $table->string('dni');
            $table->integer('movil_phone');
            $table->string('email');
            $table->integer('number_street');
            $table->DateTime('date_start');
            $table->DateTime('date_end');
            $table->string('info');

            $table->integer('ranks_id')->unsigned();
            $table->integer('streets_id')->unsigned();
            $table->integer('locationes_id')->unsigned();

            $table->foreign('ranks_id')->references('id')->on('ranks');
            $table->foreign('streets_id')->references('id')->on('streets');
            $table->foreign('locationes_id')->references('id')->on('locationes');

            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal');
    }
}
