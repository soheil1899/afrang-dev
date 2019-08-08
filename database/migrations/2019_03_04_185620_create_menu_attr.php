<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attrmenu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('menu');
            $table->integer('group')->nullable();;
            $table->string('method')->nullable();;
            $table->string('name')->nullable();;
            $table->integer('ordered')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attrmenu');
    }
}
