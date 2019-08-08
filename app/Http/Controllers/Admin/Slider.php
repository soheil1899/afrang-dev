<?php

namespace App\Http\Controllers\Admin;

use App\file_list;
use App\setting;
use App\slidergroup;
use App\sliders;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class Slider extends Controller
{
    //
    function SliderGroup(){
        return view('admin.runcompnent',array('name'=>'slidergroup'))->with('title',trans('site.Slider Group'));

    }
    function SlideGroupSave(Request $request){
        $back=(object) array();
       if($request->id==null){
           $save        =new slidergroup();

       }else{
           $save        =slidergroup::where('id',$request->id)->first();
       }
       $save->name=$request->name;
       $save->save();
        $back->success=1;
        return json_encode($back);

    }
    function LoadSlider(Request $request){
        return slidergroup::all();
    }
    function LoadSliderGroupInfo(Request $request){
        return slidergroup::where('id',$request->id)->first();
    }
    function AddToSlider(Request $request){
        $sliderlist=sliders::where('parent',$request->id)->max('ordered');
       $slider=$sliderlist+1;
        $save           =new sliders();
        $save->parent   =$request->id;
        $save->picture  =$request->file;
        $save->ordered  =$slider;
        $save->save();
    }
    function LoadSliders(Request $request){
        return sliders::where('parent',$request->id)->orderBy('ordered')->get();
    }
    function SaveOptionsSliders(Request $request){
        $save           =sliders::where('id',$request->id)->first();
        $save->titr     =$request->titr;
        $save->link     =$request->link;
        $save->name     =$request->name;
        $save->save();
        return  $save->id;
    }
    function DelSlider(Request $request){
        sliders::where('id',$request->id)->delete();
        return 1;
    }
    function DelGroupSlider(Request $request){
            $group=slidergroup::where('id',$request->id)->with('toSlider')->first();
            Storage::disk('media')->deleteDirectory('/slider/'.$request->id);
            file_list::where('method','slider')->where('idifield',$group->id)->delete();

            $group->toSlider()->delete();
            $group->delete();

    }
}
