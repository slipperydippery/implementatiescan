<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddWerkactiveToVerbeteractiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('verbeteracties', function (Blueprint $table) {
            $table->boolean('werkactive')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('verbeteracties', function (Blueprint $table) {
            $table->dropColumn('werkactive');
        });
    }
}
