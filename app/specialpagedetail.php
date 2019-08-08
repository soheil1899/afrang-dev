<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class specialpagedetail extends  Model
{
    protected $table='specialpagedetail';
    protected $primaryKey='id';
    function toSpecail(){
        return $this->belongsToMany(
            'App\specialpage',
            'attr_special',
            'page',
            'data'
        );
    }

}