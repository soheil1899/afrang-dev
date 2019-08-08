<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRollAttr extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_roll', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user');
            $table->integer('roll');
            $table->timestamps();
        });
        DB::table('attr_roll')->insert(
            array(
                'roll' => 1,
                'user' => 1,

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
        Schema::dropIfExists('attr_roll');
    }
}
