<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateScanmodelThemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('scanmodel_thema', function (Blueprint $table) {
            $table->integer('scanmodel_id')->unsigned();
            $table->foreign('scanmodel_id')->references('id')->on('scanmodels')->onDelete('cascade');
            $table->integer('thema_id')->unsigned();
            $table->foreign('thema_id')->references('id')->on('themas')->onDelete('cascade');
            $table->primary(['scanmodel_id', 'thema_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('scanmodel_thema');
    }
}
