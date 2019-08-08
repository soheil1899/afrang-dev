<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','tokenmobile',
    ];
    function checkroll(){
        return $this->belongsToMany('App\roll','attr_roll','roll','user');
    }
    function todetailmarket(){
     return $this->belongsToMany('App\ModelMarket\p_store_detail','p_attr_store_detail','user','market');

    }
    function toProf(){
        return $this->belongsToMany('App\ModelLearning\v_professor','v_attr_u_professor','prof','user');

    }
}
