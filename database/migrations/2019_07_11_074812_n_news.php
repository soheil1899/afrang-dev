<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NNews extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('subtitle')->nullable();
            $table->text('abstract')->nullable();
            $table->longText('news')->nullable();
            $table->string('video')->nullable();
            $table->integer('layout')->nullable();
            $table->integer('subject')->nullable();
            $table->integer('writter')->nullable();
            $table->string('intropic')->nullable();
            $table->string('pic')->nullable();
            $table->integer('comment')->nullable();
            $table->integer('actived')->nullable();
            $table->integer('scrolled')->nullable();
            $table->integer('publish')->nullable();
            $table->integer('publishmasterpage')->nullable();
            $table->integer('layoutmaster')->nullable();
            $table->string('publishday')->nullable();
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
        Schema::dropIfExists('n_news');
    }
}
