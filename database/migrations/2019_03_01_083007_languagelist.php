<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Languagelist extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('languagelist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('prefix')->nullable();;
            $table->string('orgianlname')->nullable();;
            $table->timestamps();
        });
        DB::table('languagelist')->insert(
            array(
                'name' => 'farsi',
                'prefix' => 'fa',
                'orgianlname' => 'فارسی',

            )
        );

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('languagelist');
    }
}
