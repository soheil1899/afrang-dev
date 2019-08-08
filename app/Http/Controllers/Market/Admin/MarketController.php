<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 4/3/2019
 * Time: 4:18 PM
 */

namespace App\Http\Controllers\Market\Admin;

use App\file_list;
use App\ModelMarket\p_catalog_file;
use App\ModelMarket\p_files_fee;
use App\ModelMarket\p_files_free;
use App\ModelMarket\p_group;
use App\ModelMarket\p_indicators_data;
use App\ModelMarket\p_price;
use App\ModelMarket\p_product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class MarketController
{
    function dashboard()
    {
        return view('store.admin.dashboard', array('name' => 'uploader'))->with('title', trans('site.new video Upload'));
    }

    /* Product  Editor */
    function newproduct()
    {
        return view('store.admin.dashboard', array('name' => 'product'))->with('title', trans('site.new product'));
    }

    function productmanager()
    {
        return view('store.admin.dashboard', array('name' => 'productmanager'))->with('title', trans('site.Product Manager'));
    }

    function listgroup_p()
    {
        return p_group::orderBy('ordred')->with('toSubGroup')->get();
    }

    function savenewproduct(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'model' => 'required',
            'group.value' => 'required',
        ]);
        $save = new p_product();
        $save->name = $request->name;
        $save->model = $request->model;
        $save->save();
        $save->toGroup()->sync($request->group['value']);

        $save->toUser()->sync(Auth::id());
        return $save->id;

    }

    function editproduct(Request $request)
    {
        return view('store.admin.dashboard', array('name' => 'product', 'id' => $request->id))->with('title', trans('site.new product'));

    }

    /* Product manager */
    function loadlistproduct(Request $request)
    {

        $p = new p_product();
        $p->whereHas('toUser', function ($query) {
            $query->where('user', Auth::id());
        });
        if (isset($request->name)) {
            $p = $p->where('name', 'LIKE', '%' . $request->name . '%');
        }
        if (isset($request->model)) {
            $p = $p->where('model', 'LIKE', '%' . $request->model . '%');
        };

        return $p->with('toGroup')->paginate(15);
    }

    function LoadProduct(Request $request)
    {
        $id = $request->id;
        $p = new p_product();
        $p->whereHas('toUser', function ($query) {
            $query->where('user', Auth::id());
        });
        $p = $p->where('id', $request->id);

        $p = $p->with(['toGroup.toBrand',
            'toGroup.toPackage',
            'toGroup.group_to_model','toGroup.group_to_ind.toSection.toIndex',
            'toGroup.group_to_ind.toSection.toIndex.toData' => function ($_query) use ($id) {
                $_query->where('product', $id);

            },
            'ToFreefile',
            'ToFeefile',
            'toGroup.toColor',
            'toAttrBrand',
            'toMasterImage',
            'toPic',
            'ToCatalog',
            'toGroup.group_to_index.group_to_indexs',
            'toAttrDetail.tooption',
            'toPrice'])
            ->first();
        return $p;
    }

    function saveprductsmore(Request $request)
    {
        //  dd($request->all());

        $request->validate([
            'product.name' => 'required',
            'product.model' => 'required',
        ]);
        $save = p_product::where('id', $request['product']['id'])->first();
        $save->title = $request['product']['title'];
        $save->min = $request['product']['min'];
        $save->max = $request['product']['max'];
        $save->save();
        $save->toAttrBrand()->sync($request->brand);
        $detail = array();
        foreach ($request->detail as $key) {
            if ($key != null) {
                array_push($detail, $key);
            }
        }

        $save->toAttrDetail()->sync($detail);

    }

    function SavePicPoroduct(Request $request)
    {
        $count = p_product::where('id', $request->id)->with('toPic')->first();
        if ($count->toPic()->count() >= 9) {
            return abort(422, trans('market.You Cant More 9 Picture Uploaded File.'));

        };

        // Create Folder
        Storage::disk('market')->makeDirectory('/product/' . $request->id);
        Storage::disk('market')->makeDirectory('/product/' . $request->id . '/image');
        Storage::disk('market')->makeDirectory('/product/' . $request->id . '/image/thump');
        Storage::disk('market')->makeDirectory('/product/' . $request->id . '/image/orginal');
        Storage::disk('market')->makeDirectory('/product/' . $request->id . '/image/optimize');
        // Save Image
        $image = new ImageManager();
        $name = rand(1000, 9999) . '.png';
        $path = public_path() . '/media/market/product/' . $request->id . '/image/';
        $image->make($request->img)->save($path . '/orginal/' . $name);
        $image->make($request->img)->resize(600, 600)->save($path . '/optimize/' . $name);
        $image->make($request->img)->resize(300, 300)->save($path . '/thump/' . $name);
        // Record In database
        $save = new file_list();
        $save->idifield = $request->id;
        $save->extension = 'image-png';
        $save->filename = $name;
        $save->method = 'product';
        $save->save();
        if ($count->toPic()->count() == 1) {
            p_product::where('id', $request->id)->first()->toMasterImage()->sync($save->id);

        }

    }

    function LoadPorductImage(Request $request)
    {
        return p_product::where('id', $request->id)->with('toPic', 'toMasterImage')->first();

    }

    function FavedmasterPic(Request $request)
    {
        $product = p_product::where('id', $request->pr);
        $product->first()->toMasterImage()->sync($request->id);
        return $product->with('toMasterImage')->first();
    }

    function RemoveProductPic(Request $request)
    {
        $product = p_product::where('id', $request->pr)->with('toMasterImage')->first();
        if ($product->toMasterImage[0]->id == $request->id) {
            return abort(422, trans('market.This Pic is Master Picture. You Can Delete This Item.'));
        }
        $file = file_list::where('id', $request->id)->first();

        Storage::disk('market')->delete('/product/' . $product->id . '/image/optimize/' . $file->filename);
        Storage::disk('market')->delete('/product/' . $product->id . '/image/orginal/' . $file->filename);
        Storage::disk('market')->delete('/product/' . $product->id . '/image/thump/' . $file->filename);
        $file->delete();


        return $product;
    }

    function setproductprice(Request $request)
    {
        $save = p_product::where('id', $request->id)->first();
        $save->pricemethod = $request->pricemethod;
        $save->save();

    }

    function Saveprice(Request $request)
    {


        $request->validate([
            'price.option' => 'required',
            'price.package' => 'required',
            'price.price' => 'required',
        ]);
       // dd($request->all());
        if ($request['price']['id'] == null) {
            $default = false;
            $save = new p_price();
            $pr = p_product::where('id', $request->id)->first();
            $find = $pr->toPrice()->where('option', $request['price']['option'])->where('package', $request['price']['package'])->count();
            if ($pr->toPrice()->count() == 0) {
                $default = true;
            }
            if ($find != 0) {
                return abort('422', 'Tekrari');
            }
            $save->option = $request['price']['option'];
            $save->package = $request['price']['package'];
            $save->actived = $default;
            $save->toProduct()->sync($request->id);

            $save->save();

        } else {
            $save = p_price::where('id', $request['price']['id'])->first();


        }
        $save->price = $request['price']['price'];
        $save->save();


    }

    function changemode(Request $request)
    {
        $p = p_product::where('id', $request->id)->first();
        $p->toPrice()->delete();
        $p->toPrice()->detach();
        $p->pricemethod = null;
        $p->save();
    }

    function Editprice(Request $request)
    {
        return p_price::where('id', $request->id)->first();
    }

    function RemovePrice(Request $request)
    {
        $price = p_price::where('id', $request->id)->first();
        $price->toProduct()->detach();
        $price->delete();
    }

    function SaveDetailPorudct(Request $request)
    {
        $save = new p_indicators_data();
        $save->text = $request->text;
        $save->product = $request->product;
        $save->save();
        $save->toDetail()->sync($request->id);
    }

    function giveDetailData(Request $request)
    {
        return p_indicators_data::where('id', $request->id)->first();
    }

    function DelDetail(Request $request)
    {
        $del = p_indicators_data::where('id', $request->id)->first();
        $del->toDetail()->detach();
        $del->delete();
    }

    function EditDetailPorudct(Request $request)
    {
        $edit = p_indicators_data::where('id', $request->id)->first();
        $edit->text = $request->text;
        $edit->save();

    }

    function UploadFileProduct(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpeg,bmp,png',
        ]);

        Storage::disk('media')->makeDirectory('/market/product/' . $request->id);
        Storage::disk('media')->makeDirectory('/market/product/' . $request->id . '/article');
        $file = $request->file;
        $destinationPath = public_path() . '/media/market/product/' . $request->id . '/article';
        $file->move($destinationPath, $file->getClientOriginalName());
        $save = new file_list();
        $save->filename = $file->getClientOriginalName();
        $save->extension = $file->getClientOriginalExtension();
        $save->extension = $file->getClientOriginalExtension();
        $save->idifield = $request->id;
        $save->method = 'productarticle';
        $save->save();

    }

    function loadfilearticle(Request $request)
    {
      return file_list::where('method','productarticle')->where('idifield',$request->id)->get();
    }
    function Delefile(Request $request){
        $file=file_list::where('id',$request->file)->first();

        Storage::disk('media')->delete('/market/product/'.$file->idifield.'/article/'.$file->filename);
        $file->delete();

    }
    function SaveArticle(Request $request){
        $p = p_product::where('id', $request->id)->first();

        $p->text1=$request->text;
        $p->save();
    }
        /* Product File */
    function UploadFreeFile(Request $request){

        Storage::disk('files')->makeDirectory('/product/'.$request->id.'/freefile');
        $destinationPath=storage_path('/app/files/product/'.$request->id.'/freefile/');
        $file = $request->file('file');
        $file->move($destinationPath,$file->getClientOriginalName());
        $save       =new p_files_free();
        $save->extension =$file->getClientOriginalExtension();
        $save->name =$file->getClientOriginalName();
        $save->save();
        $save->ToFreefile()->sync((int) $request->id);


    }
    function UploadFeeFile(Request $request){
        Storage::disk('files')->makeDirectory('/product/'.$request->id.'/file');
        $destinationPath=storage_path('/app/files/product/'.$request->id.'/file/');
        $file = $request->file('file');
        $file->move($destinationPath,$file->getClientOriginalName());
        $save       =new p_files_fee();
        $save->extension =$file->getClientOriginalExtension();
        $save->name =$file->getClientOriginalName();
        $save->save();
        $save->ToFeefile()->sync($request->id);


    }
    function delfreefile(Request $request){
        $file=p_files_free::where('id',$request->file)->first();
        Storage::disk('files')->delete('/product/'.$request->id.'/freefile/'.$file->name);
        $file->ToFreefile()->detach($request->id);
        $file->delete();

    }
    function delfeefile(Request $request){
        $file=p_files_fee::where('id',$request->file)->first();
        Storage::disk('files')->delete('/product/'.$request->id.'/freefile/'.$file->name);
        $file->ToFeefile()->detach($request->id);
        $file->delete();

    }
    function UploadCatalog(Request $request){
        $request->validate([
            'name' => 'required',
            'methods' => 'required',
            'file' => 'required',
        ]);
        Storage::disk('media')->makeDirectory('/market/product/'.$request->id.'/catalog/');
        $save   = new p_catalog_file();
        $save->name=$request->name;
        $save->methods=$request->methods;
        $destinationPath=public_path('/media/market/product/'.$request->id.'/catalog/');
        $file = $request->file('file');
        $file->move($destinationPath,$file->getClientOriginalName());
        $save->file =$file->getClientOriginalName();
        $save->save();
        $save->to_prodcut()->sync($request->id);

    }
}
