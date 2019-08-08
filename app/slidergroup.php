<?php
/**
 * Created by PhpStorm.
 * User: Afrang
 * Date: 2/5/2019
 * Time: 12:02 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;


class slidergroup extends  Model
{
    protected $table='slidergroup';
    protected $primaryKey='id';
    function toSlider(){
        return $this->hasMany('App\sliders','parent','id');
    }
}