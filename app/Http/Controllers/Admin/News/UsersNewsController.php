<?php

namespace App\Http\Controllers\Admin\News;

use App\Http\Resources\ReporterResource;

use App\ModelNews\n_layout;
use App\ModelNews\n_user;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UsersNewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.runcompnent', array('name' => 'newsuser'))->with('title', trans('site.Reporter'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=n_user::with('toUser')->get();
        //return n_user::orderBy('family')->with('toUser')->get();
        return ReporterResource::collection($user);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'family' => 'required',
            'job' => 'required',
            'password' => 'required',
            'actived' => 'required',
            'email' => ['required','unique:users,email'],

        ]);
        $save              =new n_user();
        $save->family      =$request->family;
        $save->slogan      =$request->slogan;
        $save->sex         =$request->sex;
        $save->job         =$request->job;
        $save->actived     =$request->actived;
        $save->save();

        $user               = new User();
        $user->email        = $request->email;
        $user->name         = $request->name;
        $user->phone        = $request->phone;
        $user->mobile       = $request->mobile;
        $user->password     =Hash::make($request->password);
        $user->save();

        $user->checkroll()->sync(5);
        $save->toUser()->sync($user->id);
        /*
         *
                'name'=>$request->toUser[0]->name,

                'email'=>$request->toUser[0]->email,
                'phone'=>$request->toUser[0]->phone,
                'mobile'=>$request->toUser[0]->mobile,
         */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,n_user $n_user)
    {
        return ReporterResource::make($n_user->with('toUser')->where('id',$id)->first());

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,n_user $n_user)
    {
        $user               = $n_user->with('toUser')->where('id',$id)->first();
        $iduser=$user->toUser()->first()->id;

        $request->validate([
            'name' => 'required',
            'family' => 'required',
            'job' => 'required',
            'actived' => 'required',
            'email' => [
                Rule::unique('users', 'email')->ignore($iduser),


            ]
        ]);
        $user->family      =$request->family;
        $user->slogan      =$request->slogan;
        $user->sex         =$request->sex;
        $user->job         =$request->job;
        $user->actived     =$request->actived;
        $user->save();
        $user=User::where('id',$iduser)->first();
        $user->email        = $request->email;
        $user->name         = $request->name;
        $user->phone        = $request->phone;
        $user->mobile       = $request->mobile;
        if($user->password!=null){
            $user->password     =Hash::make($request->password);

        }
        $user->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,n_user $n_user)
    {
        $n_user->where('id',$id)->delete();
    }
}
