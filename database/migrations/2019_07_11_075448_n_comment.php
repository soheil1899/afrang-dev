<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class NComment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('n_comment', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->nullable();
            $table->string('name')->nullable();
            $table->text('comment')->nullable();
            $table->integer('publish')->nullable();
            $table->integer('status')->nullable();
            $table->integer('news')->nullable();
            $table->string('ipaddress')->nullable();
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
        Schema::dropIfExists('n_comment');
    }
}
