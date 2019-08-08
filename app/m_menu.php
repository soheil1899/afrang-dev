<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class m_menu extends  Model
{
    protected $table='m_menu';
    protected $primaryKey='id';

    function toGroupMenu(){
        return $this->belongsToMany('App\m_group','attr_menu_to_group','group','menu');
    }

    function toParentMenu(){
        return $this->hasMany('App\m_menu','parent','id');
    }
}