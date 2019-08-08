<?php
/**
 * Created by PhpStorm.
 * User: afrang
 * Date: 1/14/19
 * Time: 2:01 AM
 */

namespace App\Http\Controllers\Admin;
use App\article_content;
use App\article_module;
use App\articlegroup;
use App\articles;
use App\file_list;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Intervention\Image\ImageManager;
use Validator;


class ArticleController extends Controller
{
    function category(Request $request){
            return view('admin.article.group')->with('title',trans('site.Group Manager'));
    }
    function CategoryEdit(Request $request){
        return view('admin.article.groupedit',array('id'=>@$request->id))->with('title',trans('site.Group Editor'));
    }
    function SaveCategory(Request $request){

       if($request->id!='null'){
           $request->id=(int) $request->id;
       }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => ['required',
                Rule::unique('articlegroup')->ignore($request->id)],

        ]);
        if ($validator->fails()) {
            return $validator->errors();
        }
        if($request->id=='null'){
            $save=new articlegroup();
            $myordered=articlegroup::max('ordered');
            $myordered++;
            $save->ordered=$myordered;
        }else{
            $save=articlegroup::find($request->id);
        }
        $save->name=$request->name;
        $save->url=$request->url;
        $save->description=$request->description;
        $save->lang=$request->lang;
        $save->keywords=$request->keywords;
        $save->text=$request->text;
        $save->save();
        if($request->thump!='undefined'){
            $image=new ImageManager();
            Storage::disk('media')->makeDirectory('ArticleCategory/'.$save->id);
            $path=public_path().'/media/ArticleCategory/'.$save->id;
            $image->make($request->thump->getRealPath())->save($path.'/master.jpg');
            $image->make($request->thump->getRealPath())->resize(400,300)->save($path.'/thump.jpg');
            $save->thump='/media/ArticleCategory/'.$save->id.'/thump.jpg?id='.rand(100,900);
            $save->save();

        }
        return $save->Id;
    }
    function LoadGroupList(Request $request){
        $data=articlegroup::orderBy('ordered')->with('toLang')->get();
        return $data;
    }
    function ChangeOrderGroup(Request $request){
        $save=articlegroup::find($request->id);
        $save->ordered=$request->ordered;
        $save->save();

    }
    function DelGroupArticle(Request $request){
        $id=$request->id;
        $backdata=(object) array();
        $remove=articlegroup::where('id',$id)->with('toArticle')->first();
        $count=$remove->toArticle()->count();
        if($count==0){
            Storage::disk('media')->deleteDirectory('/ArticleCategory/'.$remove->id);
            $remove->delete();
            $backdata->success=true;
            $backdata->messege=trans('site.Success');
        }else{
            $backdata->success=false;
            $backdata->messege=trans('site.This Group have Article Can not Deleted This Group');
        }
        return json_encode($backdata);
    }
    function ChangePublishGroup(Request $request){
        $save=articlegroup::find($request->id);
        $save->publish=$request->published;
        $save->save();

    }
    function LoadCategroyData(Request $request){
        return articlegroup::find($request->id);


    }
    /* Artilce  Manager */
    function NewArtilce(Request $request){
        return view('admin.article.newarticle')->with('title',trans('site.Articles'));
    }
    function EditArticle(Request $request){
        return view('admin.article.newarticle',array('id'=>$request->id))->with('title',trans('site.Articles'));

    }
    function RemoveArticle(Request $request){
       $article=articles::where('id',$request->id)->with('toContent')->first();
       $article->toContent()->detach();
       $article->toContent()->sync([]);
       $filelist=file_list::where('method','article')->where('idifield',$article->id)->delete();
       Storage::disk('media')->deleteDirectory('/article/'.$article->id);
        $article->delete();

    }
    function SaveNewArticle(Request $request){
        $backdata=(object) array();

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'url' => ['required',Rule::unique('articles')->ignore($request->id)],
            'group'=>'required'

        ]);
        if ($validator->fails()) {

            return $validator->errors();;
        };
        if($request->id==null){
            $save=          new articles();
            $max=articles::max('ordered');
            $max++;
            $save->ordered=$max;


        }else{
            $save=          articles::where('id',$request->id)->first();
            $save->writter=    $request->writter;
            $save->reference=     $request->reference;
            $save->thump=     $request->thump;


        }
        $save->name=        $request->name;
        $save->url=         $request->url;
        $save->special=     $request->special;
        $save->save();
        $save->toGroup()->sync($request->group);
        $backdata->accept=1;
        $backdata->backdata=$save->id;

        return \GuzzleHttp\json_encode($backdata);
    }
    function ArticleList(Request $request){
        return view('admin.article.articlelist')->with('title',trans('site.Article List'));

    }
    function ListArticle(Request $request){
        $list=articles::orderBy('ordered')->with('toGroup');
       // $list=$list->posts();

        if($request->search!=null){

          $list=$list->where('name','LIKE','%'.$request->search.'%');
      };

        $list=$list->paginate(20);

        return $list;
    }
    function LoadArticleData(Request $request){

        return articles::where('id',$request->id)->with('toGroup')->with('toContent')->first();
    }
    function LoadModule(Request $request){
        return article_module::all();
    }

    /**
     * @param Request $request
     * @return false|string
     */
    function LoadContentEditor(Request $request){
        $object=(object) array();
        $object->method=$request->methods;

        return json_encode($object);
    }

    function SaveSection(Request $request){
        $article=articles::where('id',$request->id)->with('toContent')->first();

       if($request->edit==null){
           $save=new article_content();
           $max=$article->toContent()->max('ordered');
           $max++;
           $save->ordered=$max;


       }else{
           $save=article_content::where('id',$request->edit)->first();
       }
        $backdata=(object) array();
       if($request->mode=="Title"){
           $save->title=$request->values;
           $save->methods=$request->mode;
           $save->save();

       };
        if($request->mode=="Gallery"){
            $save->title=$request->values;
            $save->methods=$request->mode;
            $save->save();

        };
        if($request->mode=="Images"){

            $save->title=$request->values;
            $save->methods=$request->mode;
            $save->save();

        };
        if($request->mode=="Paragraph"){

            $save->Text=$request->values;
            $save->methods=$request->mode;
            $save->save();

        };
        if($request->edit==null) {


            $artilce=articles::find($request->id);

            $artilce->toContent()->attach($save->id);
        }
        $backdata->method=true;
        return json_encode($backdata);

    }
    function DelContent(Request $request){
      $article=articles::where('id',$request->articleid)->first();
      $article->toContent()->detach($request->delitem);
        article_content::where('id',$request->delitem)->delete();

    }
    function  EditSection(Request $request){
        return article_content::where('id',$request->id)->first();
    }
    function ChangeOrderSection(Request $request){
        $article=articles::where('id',$request->id)->with('toContent')->first();
        $max=$article->toContent()->max('ordered');
        $min=$article->toContent()->min('ordered');
        $thissection=article_content::where('id',$request->method)->first();

        if($request->ordred=='Top'){
            if($min!=$thissection->ordered){
                $new=$thissection->ordered-1;

                $my= $article->toContent()->where('ordered',$new)->first();
                $to=$my->ordered;
                $beforsectiom=article_content::where('id',$my->id)->first();

                $beforsectiom->ordered=$thissection->ordered;
                $beforsectiom->save();
                $thissection->ordered=$to;
                $thissection->save();


            }
        }
        if($request->ordred=='Down'){
            if($max!=$thissection->ordered){
                $new=$thissection->ordered+1;

                $my= $article->toContent()->where('ordered',$new)->first();
                $to=$my->ordered;
                $beforsectiom=article_content::where('id',$my->id)->first();

                $beforsectiom->ordered=$thissection->ordered;
                $beforsectiom->save();
                $thissection->ordered=$to;
                $thissection->save();


            }
        }
      //  dd($request->all());
    }
}
