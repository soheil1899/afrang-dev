<?php


namespace App\Http\Controllers\Website;


use App\Http\Controllers\VideoStream;
use App\ModelVideo\v_lock_play;
use App\ModelVideo\v_video_file;
use Illuminate\Http\Request;

class PlaymovieController
{
    function palymovie(Request $request)
    {
        return view('playmovie', array('name' => 'playmovie','id'=>$request->id))->with('title', trans('site.playmovie'));
    }
    function palymovieonline(Request $request){
        $fileinofmration=v_lock_play::where('id',$request->id)
            ->where('sessionnumber',session()->getId())
            ->where('expire','!=',1)
           ->first();

        $videosDir = storage_path('/app/video/converted');
        $videosDir=$videosDir.'/'.$fileinofmration->video.'/video_640.mp4';
        $stream = new VideoStream($videosDir);

        $fileinofmration->expire=1;
        $fileinofmration->save();

        return response()->stream(function() use ($stream) {
            $stream->start();
        });



    }
    function loadvideourl(Request $request){
        $fileinofmration=v_video_file::where('id',$request->id)->first();
    $check=v_lock_play::where('video',$fileinofmration->id)->where('sessionnumber',session()->getId())->count();
       if($check!=0){
           v_lock_play::where('video',$fileinofmration->id)->where('sessionnumber',session()->getId())->delete();
       }
        $save           = new v_lock_play();
        $save->video    =$fileinofmration->id;
        $save->tokennumber= rand(10000000,99999999);
        $save->sessionnumber= session()->getId();
        $save->expire=0;
        $save->save();
        return $save;


    }
}