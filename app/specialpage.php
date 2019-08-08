<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class specialpage extends  Model
{
    protected $table='specialpage';
    protected $primaryKey='id';
   function toData(){
       return $this->belongsToMany(
           'App\specialpagedetail',
           'attr_special',
           'data',
           'page');
   }

}