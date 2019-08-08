<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/7/2019
 * Time: 12:59 PM
 */

namespace App\Http\Controllers\Admin;


use App\file_list;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Pion\Laravel\ChunkUpload\Exceptions\UploadMissingFileException;
use Pion\Laravel\ChunkUpload\Handler\AbstractHandler;
use Pion\Laravel\ChunkUpload\Handler\HandlerFactory;
use Pion\Laravel\ChunkUpload\Receiver\FileReceiver;

class FileManagerController
{
    protected function saveFile(UploadedFile $file,$path,$option)
    {
        $fileName = $this->createFilename($file);
        // Group files by mime type
        $mime = str_replace('/', '-', $file->getMimeType());
        // Group files by the date (week
        $dateFolder = date("Y-m-W");
        // Build the file path
       //$filePath = "upload/{$mime}/{$dateFolder}/";
        $finalPath = public_path('/media/'.$path);
        // Save to Database
        $save               =new file_list();
        $save->filename     =$fileName;
        $save->method       =$option->method;
        $save->extension    =$mime;
        $save->idifield     =$option->id;
        $save->save();
        // move the file name
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
    public function UploadFile(Request $request) {
       $option=(object) array();
       $option->method=$request->method;
       $option->id=$request->id;

        $path=$request->method.'/'.$request->id;

        Storage::disk('media')->makeDirectory($path);

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
    function listFile(Request $request){
       // $filelist=Storage::disk('media')->files($request->method.'/'.$request->articleid);
     //   return $filelist;
        $file=file_list::where('method',$request->method)->where('idifield',$request->articleid)->get();
        return $file;

    }
    function Delitem(Request $request){
        $file=file_list::where('id',$request->id)->first();
        Storage::disk('media')->delete('/'.$file->method.'/'.$file->id.'/'.$file->filename);
        $file->delete();
    }
}