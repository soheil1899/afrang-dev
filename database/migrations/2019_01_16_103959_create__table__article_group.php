<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableArticleGroup extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articlegroup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('title')->nullable();

            $table->string('url')->nullable();
            $table->string('thump')->nullable();
            $table->longText('text')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->boolean('publish')->default(true);
            $table->boolean('showblog')->default(true);
            $table->integer('lang')->default(true);
            $table->integer('ordered')->nullable();
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
        Schema::dropIfExists('articlegroup');
    }
}
