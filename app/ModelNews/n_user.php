<?php

namespace App\ModelNews;

use App\User;
use Illuminate\Database\Eloquent\Model;

class n_user extends Model
{
   protected  $table='n_user';

   function toUser(){
       return $this->belongsToMany('App\User','n_attr_user','user','news');
   }
}
