<?php

namespace App\Http\Controllers\Admin\News;

use App\ModelNews\n_layout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ModelNews\n_layout_adv;
use Illuminate\Validation\Rule;

class LayoutControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.runcompnent', array('name' => 'newslayout'))->with('title', trans('site.newslayout'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(n_layout $n_layout)
    {
        return $n_layout->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,n_layout $n_layout)
    {
        $request->validate([
            'name' => 'required',
            'url' => ['required','unique:n_layout_adv,url'],

        ]);
        $save               =new $n_layout();
        $save->name         =$request->name;
        $save->url      =$request->url;
        $save->save();
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
    public function edit($id,n_layout $n_layout)
    {
        return $n_layout->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,n_layout $n_layout)
    {
        $save= $n_layout->find($id);
        $request->validate([
            'name' => 'required',
            'url' => [
                Rule::unique('n_layout', 'url')->ignore($save->id),


            ]

        ]);
        $save->name      =$request->name;
        $save->url  =$request->url;
        $save->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,n_layout $n_layout)
    {
        $del=$n_layout->find($id);
        $del->delete();
    }
}
