<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations
\Migration;
use Illuminate\Support\Facades\DB;
class CreateModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('article_module', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon')->nullable();
            $table->string('name')->nullable();
            $table->string('options')->nullable();
            $table->string('others')->nullable();
            $table->timestamps();
        });
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Align-Left',
                'name' => 'Paragraph',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Text-Box',
                'name' => 'Title',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-File-Pictures',
                'name' => 'Image',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Cloud-Picture',
                'name' => 'Gallery',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Sound',
                'name' => 'Sound',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Video',
                'name' => 'Video',
                'options' => '',
                'others' => '',
            )
        );
        DB::table('article_module')->insert(
            array(
                'icon' => 'iconsmind-Bulleted-List',
                'name' => 'List',
                'options' => '',
                'others' => '',
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
        Schema::dropIfExists('article_module');
    }
}
