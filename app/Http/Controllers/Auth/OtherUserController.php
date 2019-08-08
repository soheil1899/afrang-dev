<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/21/2019
 * Time: 12:00 PM
 */

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

class OtherUserController
{
    function logout(){
        
        Auth::logout();
       return redirect()->route('login');
    }
}