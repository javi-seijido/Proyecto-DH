<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->string('username');
          $table->integer('act');
          $table->integer('perfil_id')->unsigned();
          $table->softDeletes();
          $table->foreign('perfil_id')->references('id')->on('profiles');
          $table->dropColumn('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
          $table->dropColumn('username');
          $table->dropColumn('act');
          $table->dropColumn('perfil_id');
          $table->dropColumn('deleted_at');
          $table->string('name');
        });
    }
}
