<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class setting extends  Model
{
    protected $table='setting';
    protected $primaryKey='id';
    function toLang(){
        return $this->hasOne('App\languagelist','id','lang');
    }
}