<?php
/**
 * Created by PhpStorm.
 * User: afrang
 * Date: 3/25/19
 * Time: 1:20 PM
 */

namespace App\Http\Controllers\Admin\Video;

use App\Http\Controllers\VideoStream;
use App\Jobs\ProcessPodcast;
use App\ModelVideo\v_video_file;
use App\ModelVideo\v_video_section;
use http\Env\Response;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;


class VideoCenterController
{

    function dashboard(){
        return view('tissplayer.admin.dashboard',array('name'=>'uploader'))->with('title',trans('site.new video Upload'));
    }
    function newvideouplaoder(){
        return view('tissplayer.admin.dashboard',array('name'=>'uploader'))->with('title',trans('site.new video Upload'));

    }

    protected function saveFile(UploadedFile $file,$path,$option)
    {
        $fileName = $this->createFilename($file);
        $mime = str_replace('/', '-', $file->getMimeType());
        $finalPath = storage_path('/app/video/'.$path);
        $file->move($finalPath, $fileName);
        return response()->json([
            'path' => $finalPath,
            'name' => $fileName,
            'mime_type' => $mime
        ]);
    }
    protected function createFilename(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        $filename = str_replace(".".$extension, "", $file->getClientOriginalName()); // Filename without extension
        // Add timestamp hash to name of the file
        $filename .= "_" . md5(time()) . "." . $extension;
        return $filename;
    }
    public function LoadVideoFile(Request $request){
            return v_video_file::where('id',$request->video)->first();
    }
    public function RenameVideoFile(Request $request){
           $file= v_video_file::where('id',$request->video)->first();
           $file->name=  $request->name;
           $file->save();
           return $file;
    }
    public function uploadvideofile(Request $request) {

        $option=(object) array();

        $path='/library';

        Storage::disk('vidoe')->makeDirectory($path);

        // create the file receiver
        $receiver = new FileReceiver("file", $request, HandlerFactory::classFromRequest($request));
        // check if the upload is success, throw exception or return response you need
        if ($receiver->isUploaded() === false) {
            throw new UploadMissingFileException();
        }
        // receive the file
        $save = $receiver->receive();

        // check if the upload has finished (in chunk mode it will send smaller files)
        if ($save->isFinished()) {
            // save the file and return any response you need, current example uses `move` function. If you are
            // not using move, you need to manually delete the file by unlink($save->getFile()->getPathname())
            return $this->saveFile($save->getFile(),$path,$option);
        }
        // we are in chunk mode, lets send the current progress
        /** @var AbstractHandler $handler */
        $handler = $save->handler();
        return response()->json([
            "done" => $handler->getPercentageDone(),
            'status' => true
        ]);
    }

    function videoconvertor(){
        return view('tissplayer.admin.dashboard',array('name'=>'convertor'))->with('title',trans('site.new video Upload'));

    }
    function listfileseraw(Request $request){
       $list=Storage::disk('videoraw')->allFiles();
        $filedecoder=v_video_file::all();
        $movie=[];
        return $list;
        foreach ($filedecoder as $item){
        array_push($movie,$item->vidoefilename) ;
        }
        $flist=array_diff($list,$movie);
        return $flist;
    }
    public function getWatch(Request $request) {
        $file=v_video_file::where('id',$request->id)->with('to_videosection')->first();
        $videosDir = storage_path('app/video/converted/'.$file->id.'/video_640.mp4');
        $stream = new VideoStream($videosDir);
        $stream->start();


        return response("File doesn't exists", 404);

    }
    public function getWatchmaster(Request $request) {
        // Pasta dos videos.
        $videosDir = storage_path('/app/video/library/'.$request->filename);
        if (file_exists($filePath = $videosDir)) {
            $stream = new VideoStream($filePath);
            return response()->stream(function() use ($stream) {
                $stream->start();
            });
        }
        return response("File doesn't exists", 404);

    }
    public function getplay($filename) {
        // Pasta dos videos.
        $videosDir = storage_path();
        if (file_exists($filePath = $videosDir.$filename)) {
            $stream = new VideoStream($filePath);
            return response()->stream(function() use ($stream) {
                $stream->start();
            });
        }
        return response("File doesn't exists", 404);

    }

    function ArtisanConvertor($moviename,$filename){
        $list=Storage::disk('videoraw')->exists($moviename);
        if($list==false){
            echo 'Not Found '.$moviename .' file'.PHP_EOL;
            echo 'Good Bye!'.PHP_EOL;
            return;
        };
        $findfile=Storage::disk('videoraw')->getAdapter()->getPathPrefix();
        $file=$findfile.$moviename;
        $save                   = new v_video_file();
        $save->vidoefilename    = $filename;


        $time = exec("ffmpeg -i ".$file." 2>&1 | grep Duration | cut -d ' ' -f 4 | sed s/,//");
        echo 'Full Time Your Movie is'.$time;
        $save                   = new v_video_file();
        $save->name              =$filename;
        $save->save();
        Storage::disk('video')->makeDirectory('/converted/'.$save->id);
        $path=Storage::disk('video')->getAdapter()->getPathPrefix();
        $pathfinal=$path.'/converted/'.$save->id;
        $pathpic=public_path().'/media/video/'.$save->id.'.jpg';
        exec('ffmpeg -ss 00:00:10 -i '.$file.' -vframes 1 -q:v 2 '.$pathpic);
          exec('ffmpeg -i '.$file.' -vf scale=640:360 '.$pathfinal.'/video_640.mp4 -hide_banner');
          exec('ffmpeg -i '.$file.' -vf scale=1920:1020 '.$pathfinal.'/video_1080.mp4 -hide_banner');
          exec('ffmpeg -i '.$file.' -vf scale=1280:720 '.$pathfinal.'/video_720.mp4 -hide_banner');

    }
    function Convertor(Request $request){

     $findfile=Storage::disk('videoraw')->getAdapter()->getPathPrefix();
        $file=$findfile.$request->video;



        $time = exec("ffmpeg -i ".$file." 2>&1 | grep Duration | cut -d ' ' -f 4 | sed s/,//");
        $str_time = preg_replace("/^([\d]{1,2})\:([\d]{2})$/", "00:$1:$2", $time);
        sscanf($str_time, "%d:%d:%d", $hours, $minutes, $seconds);
        $time_seconds = $hours * 3600 + $minutes * 60 + $seconds;

        $splitetime= $time_seconds/5;
        $first=1;
        $end=5;
        $save                   = new v_video_file();
        $save->vidoefilename    = $request->video;
        $save->save();
        Storage::disk('video')->makeDirectory('/converted/'.$save->id);
        $path=Storage::disk('video')->getAdapter()->getPathPrefix();
        $pathfinal=$path.'/converted/'.$save->id;
        $pathpic=public_path().'/media/video/'.$save->id.'.jpg';
        exec('ffmpeg -ss 00:00:10 -i '.$file.' -vframes 1 -q:v 2 '.$pathpic);
        $targetpath=Storage::disk('video')->get('/converted/'.$save->id);
      //  exec('ffmpeg -i '.$file.' -vf scale=640:360 '.$pathfinal.'/video_640.mp4 -hide_banner');
      //  exec('ffmpeg -i '.$file.' -vf scale=1920:1020 '.$pathfinal.'/video_1080.mp4 -hide_banner');
      //  exec('ffmpeg -i '.$file.' -vf scale=1280:720 '.$pathfinal.'/video_720.mp4 -hide_banner');

      /*  for ($i = 1; $i <= $splitetime; $i++) {
            echo $i;
            $first=($i*$end)-$end;
            $name=$i;
            exec('ffmpeg -i '.$file.' -ss '.$first.' -t 5 '.$pathfinal.'/'.$name.'.mp4');
            $section=new v_video_section();
            $section->address= $name.'.mp4';
            $section->ordered=$i;
            $section->save();
            $save->to_videosection()->attach($section->id);

        }*/

    }

    function videolist(Request $request){
        return view('tissplayer.admin.dashboard',array('name'=>'listvideo'))->with('title',trans('site.listvideo'));

    }
    function playvideo(Request $request){
        return view('tissplayer.admin.dashboard',array('name'=>'player','id'=>$request->id))->with('title',trans('site.Paly').' '.$request->namefile);

    }

    function listfile(Request $request){
        return v_video_file::all();
    }
    function playvideosection(Request $request){
        return v_video_file::where('id',$request->video)->with('to_videosection')->first();

    }

}
