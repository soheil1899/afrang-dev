<?php


namespace App\Http\Controllers\Website;
use App\Http\Controllers\Website\PagesController;

use App\Http\Resources\OnlineClassResource;
use App\Http\Resources\ProffessorResource;
use App\ModelLearning\v_professor;
use App\ModelVideo\t_classroom;
use App\User;
use Illuminate\Http\Request;

class onlinelearninController
{
    function onlinelist(Request $request){
        $pagecontroller=new PagesController();
        $setting=$pagecontroller->getsetting();
        $header=(object) array();
        $header->title=$setting->websitename;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        return view('website.pages.onlinelearning',array('header'=>$header,'menu'));
    }
    function getonlinelearning(Request $request){
        return t_classroom::with('toPorf.toProf','toLesson')->get();
    }
    function teacherdetail(Request $request){

    }
    function onlineclass(Request $request){
        $classsonline=t_classroom::where('id',$request->id)->with('toPorf.toProf')->first();
        $pagecontroller=new PagesController();
        $setting=$pagecontroller->getsetting();
        $header=(object) array();
        $header->title=trans('site.onlineclass').$classsonline->name.' - '.$classsonline->toPorf->name.' '.$classsonline->toPorf->toProf[0]->family;
        $header->keywords=$setting->keywords;
        $header->description=$setting->description;
        $header->image='/media/Layout/'.$setting->logo;
        return view('website.publicpage',array('component'=>'onlineclass','header'=>$header,'menu','id'=>$classsonline->id));

    }
    function loadclassonline(Request $request){
        $classsonline=t_classroom::where('id',$request->id)->with('toPorf.toProf','toLesson')->first();

        return OnlineClassResource::make($classsonline);

    }
    function loadprofilestudent(Request $request){
            $user=v_professor::where('id',$request->id)->with('toUser')->first();
           return ProffessorResource::make($user);
    }
}