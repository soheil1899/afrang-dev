<?php


namespace App\Http\Controllers\User;


class UserController
{
    function homepage(){
        return view('user.panelusers',array('name'=>'dashborad',))->with('title',trans('site.new video Upload'));
    }
    function addCredit(){
        return view('user.panelusers',array('name'=>'dashborad','component'=>'credit'))->with('title',trans('site.new video Upload'));
    }
    function checkmobile(){
        return view('user.checkmobile',array('name'=>'uploader'))->with('title',trans('site.new video Upload'));
    }
}