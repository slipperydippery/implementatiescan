<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOvbetrokkenenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ovbetrokkenen', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('verbeteractie_id')->unsigned();
            $table->foreign('verbeteractie_id')->references('id')->on('verbeteracties')->onDelete('cascade');
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
        Schema::drop('ovbetrokkenen');
    }
}
