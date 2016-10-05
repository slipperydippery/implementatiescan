<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('blurb');
            $table->string('regio');
            $table->boolean('locked')->default(false);
            $table->boolean('deeleen')->default(true);
            $table->boolean('deeleencomplete')->default(false);
            $table->date('datedeeleen');
            $table->time('timedeeleen');
            $table->boolean('deeltwee')->default(true);
            $table->date('datedeeltwee');
            $table->time('timedeeltwee');
            $table->boolean('deeltweecomplete')->default(false);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('scanmodel_id')->unsigned();
            $table->foreign('scanmodel_id')->references('id')->on('scanmodels')->onDelete('cascade');
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
        Schema::drop('scans');
    }
}

