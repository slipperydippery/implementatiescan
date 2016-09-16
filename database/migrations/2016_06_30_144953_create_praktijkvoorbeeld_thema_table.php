<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePraktijkvoorbeeldThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('praktijkvoorbeeld_thema', function (Blueprint $table) {
            $table->integer('praktijkvoorbeeld_id')->unsigned();
            $table->foreign('praktijkvoorbeeld_id')->references('id')->on('praktijkvoorbeelds')->onDelete('cascade');
            $table->integer('thema_id')->unsigned();
            $table->foreign('thema_id')->references('id')->on('themas')->onDelete('cascade');
            $table->primary(['praktijkvoorbeeld_id', 'thema_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('praktijkvoorbeeld_thema');
    }
}
