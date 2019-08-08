<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/17/2019
 * Time: 11:51 AM
 */

namespace App\Http\Controllers\Website;
use App\articles;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SendSms;
use App\ModelLearning\v_professor;
use App\setting;
use App\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;

class PagesController extends Controller
{
    use general;
    public function __construct()
    {
//        $this->middleware('LoginCheck')->only('home');

    }

    function index(){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;


        return view('website.pages.firstpage',array('header'=>$header));
    }

    function programmerteam(){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;


        return view('website.pages.programmerteam',array('header'=>$header));
    }

    function contactus(){
        $setting=$this->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;


        return view('website.pages.contactus',array('header'=>$header));
    }

}