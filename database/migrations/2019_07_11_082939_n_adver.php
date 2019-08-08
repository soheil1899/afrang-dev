<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NAdver extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_adver', function (Blueprint $table) {
            $table->increments('id');
            $table->string('publishday')->nullable();
            $table->string('texts')->nullable();
            $table->integer('day')->nullable();
            $table->boolean('actived')->nullable();
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
        Schema::dropIfExists('n_adver');
    }
}
