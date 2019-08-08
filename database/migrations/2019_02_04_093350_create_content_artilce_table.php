<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentArtilceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_content', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('Text')->nullable();
            $table->string('title')->nullable();
            $table->string('images')->nullable();
            $table->integer('ordered')->default(0);
            $table->integer('publish')->default(1);
            $table->string('methods')->nullable();;
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
        Schema::dropIfExists('article_content');
    }
}
