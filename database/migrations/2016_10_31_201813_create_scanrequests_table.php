<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScanrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scanrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('regio');
            $table->string('beheerder_name_first');
            $table->string('beheerder_name_last');
            $table->string('beheerder_email');
            $table->integer('beheerder_instantie');
            $table->boolean('testscan');
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
        Schema::drop('scanrequests');
    }
}
