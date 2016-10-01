<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubactiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subacties', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('omschrijving');
            $table->date('datum');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('verbeteractie_id')->unsigned();
            $table->foreign('verbeteractie_id')->references('id')->on('verbeteracties')->onDelete('cascade');
            $table->softDeletes();
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
        Schema::drop('subacties');
    }
}
