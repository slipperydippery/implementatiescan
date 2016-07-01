<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgrammaThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('programma_thema', function (Blueprint $table) {
            $table->integer('programma_id')->unsigned();
            $table->foreign('programma_id')->references('id')->on('programmas')->onDelete('cascade');
            $table->integer('thema_id')->unsigned();
            $table->foreign('thema_id')->references('id')->on('themas')->onDelete('cascade');
            $table->primary(['programma_id', 'thema_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('programma_thema');
    }
}
