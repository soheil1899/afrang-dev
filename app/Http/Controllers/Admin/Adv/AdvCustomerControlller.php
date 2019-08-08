<?php

namespace App\Http\Controllers\Admin\Adv;

use App\ModelNews\n_adver_customer;
use App\ModelNews\n_layout_adv;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class AdvCustomerControlller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.runcompnent', array('name' => 'customer'))->with('title', trans('site.Customers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(n_adver_customer $n_adver_customer)
    {
        return $n_adver_customer->orderBy('ordered')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,n_adver_customer $n_adver_customer)
    {
        $request->validate([
            'name' => 'required',

        ]);
        $save               =new $n_adver_customer();
        $save->name         =$request->name;
        $save->family      =$request->family;
        $save->email      =$request->email;
        $save->company      =$request->company;
        $save->address      =$request->address;
        $save->phone      =$request->phone;
        $save->mobile      =$request->mobile;
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
    public function edit($id,n_adver_customer $n_adver_customer)
    {
        return $n_adver_customer->find($id);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id,n_adver_customer $n_adver_customer)
    {
        $save= $n_adver_customer->find($id);
        $request->validate([
            'name' => 'required',
            'family' => 'required',


        ]);
        $save->name         =$request->name;
        $save->family      =$request->family;
        $save->email      =$request->email;
        $save->company      =$request->company;
        $save->address      =$request->address;
        $save->phone      =$request->phone;
        $save->mobile      =$request->mobile;
        $save->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,n_adver_customer $n_adver_customer)
    {
        $del=$n_adver_customer->find($id);
        $del->delete();

    }
}
