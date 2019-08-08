<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class m_group extends  Model
{
    protected $table='m_group';
    protected $primaryKey='id';

    function toLang(){
        return $this->hasOne('App\languagelist','id','lang');
    }

    function toGroupMenu(){
        return $this->belongsToMany('App\m_menu','attr_menu_to_group','menu','group');
    }
}