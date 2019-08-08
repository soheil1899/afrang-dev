<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
class Configpages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $langlist=DB::select('select * from languagelist');
        foreach ($langlist as $key){
            DB::table('specialpage')->insert(
                array(
                    'methods' => 'firstpage',
                    'lang' => $key->id,
                )
            );
            DB::table('specialpage')->insert(
                array(
                    'methods' => 'about',
                    'lang' => $key->id,

                )
            );
            DB::table('specialpage')->insert(
                array(
                    'methods' => 'contactus',
                    'lang' => $key->id,

                )
            );
            DB::table('setting')->insert(
                array(
                    'websitename' => 'Afrang',
                    'lang' => $key->id,

                )
            );

        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
