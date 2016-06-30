<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstrumentThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instrument_thema', function (Blueprint $table) {
            $table->integer('instrument_id')->unsigned();
            $table->foreign('instrument_id')->references('id')->on('instruments')->onDelete('cascade');
            $table->integer('thema_id')->unsigned();
            $table->foreign('thema_id')->references('id')->on('themas')->onDelete('cascade');
            $table->primary(['instrument_id', 'thema_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('instrument_thema');
    }
}
