<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExternalusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('externalusers', function (Blueprint $table) {
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
        Schema::drop('externalusers');
    }
}
