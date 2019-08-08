<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\setting;
use App\specialpage;
use App\specialpagedetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class SettingController extends Controller
{
    //
    function Settingpage()
    {
        return view('admin.runcompnent', array('name' => 'settingpage'))->with('title', trans('site.Setting'));
    }

    function LoadSettingpage(Request $request)
    {

        return setting::where('lang', $request->lang)->first();
    }

    function SaveSetting(Request $request)
    {
        $save = setting::where('lang', $request->lang)->first();
        $save->websitename = $request->data['websitename'];
        $save->keywords = $request->data['keywords'];
        $save->description = $request->data['description'];
        $save->googlemap = $request->data['googlemap'];
        $save->phone = $request->data['phone'];
        $save->fax = $request->data['fax'];
        $save->supportphone = $request->data['supportphone'];
        $save->otherphone = $request->data['otherphone'];
        $save->facebook = $request->data['facebook'];
        $save->email = $request->data['email'];
        $save->twitter = $request->data['twitter'];
        $save->telegram = $request->data['telegram'];
        $save->telegramchanal = $request->data['telegramchanal'];
        $save->address = $request->data['address'];
        $save->googleplus = $request->data['googleplus'];
        $save->instagram = $request->data['instagram'];
        $save->googlecode = $request->data['googlecode'];
        $save->lang = $request->data['lang'];
        $save->save();

    }

    function Savelogo(Request $request)
    {
        $save = setting::where('lang', $request->lang)->first();
        $path = public_path() . '/media/Layout/';
        $image = new ImageManager();
        $image->make($request->logo->getRealPath())->save($path . '/' . $request->lang . 'logo.png');
        $save->logo = $request->lang . 'logo.png?=' . rand(100, 900);
        $save->save();
    }

    function SaveFav(Request $request)
    {
        $save = setting::where('lang', $request->lang)->first();
        $path = public_path() . '/media/Layout/';
        $image = new ImageManager();

        $image->make($request->favicon->getRealPath())->save($path . '/' . $request->lang . 'favicon.png');

        $save->favicon = $request->lang . 'favicon.png?=' . rand(100, 900);


        $save->save();


    }

    function profile()
    {
        return view('admin.runcompnent', array('name' => 'profileedit'))->with('title', trans('site.Profile Edit'));

    }

    function Firtpagesetting()
    {
        return view('admin.runcompnent', array('name' => 'firstpagesetting'))->with('title', trans('site.First Page Setting'));

    }

    function LoadSpecialPage(Request $request)
    {
        $page = specialpage::where('id', 1)->with('toData')->first();
       return $page;
    }
    function Savepicfirstpage(Request $request){
        $page = specialpage::where('id', 1)->with('toData')->first();
        $image = new ImageManager();
        if($request[$request->name]!=null){
            $image->make($request->header->getRealPath())->save(public_path() . '/media/Firstpage/'.$request->name.'.png');
            $check=$page->toData()->where('name',$request->name)->first();
            if($check==null){
                $save= new specialpagedetail();
                $save->name=$request->name;
                $save->data='/media/Firstpage/'.$request->name.'.png?id='.rand(1000,9999);
                $save->save();
                $page->toData()->sync($save->id);
            }else{
                $save= specialpagedetail::where('id',$check->id)->first();
                $save->name=$request->name;
                $save->data='/media/Firstpage/'.$request->name.'.png?id='.rand(1000,9999);
                $save->save();
            }
        }
    }
    function SaveFirstPage(Request $request)
    {

        $page = specialpage::where('id', 1)->with('toData')->first();
        foreach ($request->data as $key=>$value){
                $check=$page->toData()->where('name',$key)->first();
                if($check==null){
                    $save= new specialpagedetail();
                    $save->name=$key;
                    $save->data=$value;
                    $save->save();

                    $save->toSpecail()->sync($page->id);
                }else{
                    $save= specialpagedetail::where('id',$check->id)->first();
                    $save->name=$key;
                    $save->data=$value;
                    $save->save();


            }

        }
    }
}
