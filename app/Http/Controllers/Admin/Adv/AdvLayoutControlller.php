<?php

namespace App\Http\Controllers\Admin\Adv;

use App\ModelNews\n_layout_adv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdvLayoutControlller extends Controller
{
    public function index()
    {
        return view('admin.runcompnent', array('name' => 'adverlayout'))->with('title', trans('site.newslayout'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(n_layout_adv $n_layout_adv)
    {
        return $n_layout_adv->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,n_layout_adv $n_layout_adv)
    {
        $request->validate([
            'name' => 'required',
            'url' => ['required','unique:n_layout_adv,url'],

        ]);
        $save               =new $n_layout_adv();
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
    public function edit($id,n_layout_adv $n_layout_adv)
    {
        return $n_layout_adv->find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,n_layout_adv $n_layout)
    {
        $save= $n_layout->find($id);
        $request->validate([
            'name' => 'required',
            'url' => [
                Rule::unique('n_layout_adv', 'url')->ignore($save->id),


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
    public function destroy($id,n_layout_adv $n_layout_adv)
    {
        $del=$n_layout_adv->find($id);
        $del->delete();
    }
}
