<?php

namespace App\Http\Controllers\Admin\News;

use App\ModelNews\n_subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.runcompnent', array('name' => 'newssubject'))->with('title', trans('site.newssubject'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(n_subject $n_subject)
    {
        return $n_subject->orderBy('ordered')->get();
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

        ]);
       $save             =new n_subject();
       $save->name      =$request->name;
       $save->insubmenu  =$request->insubmenu;
       $save->save();
       $max=n_subject::get()->max('ordered');
       $max=$max+1;
       $save->ordered=$max;
       $save->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ModelNews\n_subject  $n_subject
     * @return \Illuminate\Http\Response
     */
    public function show(n_subject $n_subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ModelNews\n_subject  $n_subject
     * @return \Illuminate\Http\Response
     */
    public function edit($id,n_subject $n_subject)
    {
        return $n_subject->find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ModelNews\n_subject  $n_subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, n_subject $n_subject,$id)
    {
       $save= $n_subject->find($id);
        $request->validate([
            'name' => 'required',

        ]);
        $save->name      =$request->name;
        $save->insubmenu  =$request->insubmenu;
        $save->save();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModelNews\n_subject  $n_subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(n_subject $n_subject,$id)
    {

        $del=$n_subject->find($id);
        $del->delete();

    }
    function up(Request $request,n_subject $n_subject){
        $current=$n_subject->find($request->id);

        $smaller=$n_subject->orderBy('ordered','DESC')->where('ordered','<',$current->ordered)->first();
        if($smaller!=null){
            $up=$smaller->ordered;
            $smaller->ordered=$current->ordered;
            $smaller->save();
            $current->ordered=$up;
            $current->save();
        }


    }
    function down(Request $request,n_subject $n_subject){
        $current=$n_subject->find($request->id);

        $bigger=$n_subject->orderBy('ordered')->where('ordered','>',$current->ordered)->first();
        if($bigger!=null){
            $up=$bigger->ordered;
            $bigger->ordered=$current->ordered;
            $bigger->save();
            $current->ordered=$up;
            $current->save();
        }
    }

}
