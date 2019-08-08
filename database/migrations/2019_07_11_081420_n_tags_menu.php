<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NTagsMenu extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_tags_menu', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tag');
            $table->string('name')->nullable();
            $table->integer('ordered')->nullable();
            $table->integer('models')->nullable();
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
        Schema::dropIfExists('n_tags_menu');
    }
}
