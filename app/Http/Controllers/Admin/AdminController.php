<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Validator;

class AdminController extends Controller
{

    function homepage(Request $request){

        return view('admin.home')->with('title',trans('site.Home Page'));
    }
    function about(Request $request){
        return view('admin.about')->with('title',trans('site.About Page'));
    }
    function LoadprofileInformation(Request $request){
       return Auth::user()->name;
    }
    function LoadprofileInformations(Request $request){
        return Auth::user();
    }
    function changepassword(){
        return view('admin.runcompnent',array('name'=>'changepassword'))->with('title',trans('site.Change Password'));

    }
    function Savepassword(Request $request){
        $request->validate([
            'password' => 'required|confirmed',

        ]);
        if (Hash::check($request->oldpassword, Auth::user()->password)) {
            Auth::user()->password=Hash::make($request->password);
            Auth::user()->save();
            return trans('site.Success');
        }else{
            return trans('site.Old Password Is Wrong');
        }

    }
    function Saveprofileedit(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => [
                'required',
                Rule::unique('users')->ignore(Auth::user()->id),
            ],
        ]);
        Auth::user()->name=$request->name;
        Auth::user()->email=$request->email;
        Auth::user()->mobile=$request->mobile;
        Auth::user()->save();
        return trans('site.Success');
    }
}
