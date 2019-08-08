<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_list', function (Blueprint $table) {
            $table->increments('id');
            $table->string('filename')->nullable();
            $table->string('extension')->nullable();
            $table->integer('idifield')->nullable();
            $table->string('method')->nullable();
            $table->string('option')->nullable();
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
        Schema::dropIfExists('file_list');
    }
}
