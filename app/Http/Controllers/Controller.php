<?php

namespace App\Http\Controllers;

use App\languagelist;
use App\specialpage;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    function getlang(Request $request){
        return  languagelist::get();
    }
    function Loadfirstpage(){
       return specialpage::where('id',1)->first()->toData()->get();
    }
}
