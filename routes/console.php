<?php

use Illuminate\Foundation\Inspiring;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('convertor:movie {moviename} {filename}',
    function ($moviename,$filename) {
    echo 'Wellcome to Tiss Convertor' . PHP_EOL;;
    echo 'Your Movie Selected Is:'.$moviename. PHP_EOL;;
    if($filename==null){
        echo "Fuck";
        return;
    }
    $video =new \App\Http\Controllers\Admin\Video\VideoCenterController();
    $video->ArtisanConvertor($moviename,$filename);
   // $this->comment(Inspiring::quote());
})->describe('Movie Convertor');
