<?php


namespace App\Http\Controllers\Website;


use App\setting;

trait general
{
    function  getsetting(){
        return setting::where('lang',1)->first();
    }
}