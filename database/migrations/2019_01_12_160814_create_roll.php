<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class CreateRoll extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roll', function (Blueprint $table) {
            $table->increments('id');
            $table->string('roll');
            $table->timestamps();
        });
        DB::table('roll')->insert(
            array(
                'roll' => 'admin',

            )
        );
        DB::table('roll')->insert(
            array(
                'roll' => 'user',

            )
        );
        DB::table('roll')->insert(
            array(
                'roll' => 'store',

            )
        );

        DB::table('roll')->insert(
            array(
                'roll' => 'teacher',

            )
        );
        DB::table('roll')->insert(
            array(
                'roll' => 'editor',

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
        Schema::dropIfExists('roll');
    }
}
