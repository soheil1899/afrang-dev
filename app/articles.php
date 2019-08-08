<?php
/**
 * Created by PhpStorm.
 * User: afrang
 * Date: 1/13/19
 * Time: 12:41 AM
 */

namespace App;
use Illuminate\Database\Eloquent\Model;

class articles extends  Model
{
    protected $table='articles';
    protected $primaryKey='id';
    function toGroup(){
        return $this->belongsToMany('App\articlegroup','attr_article_group','article','group');
    }
    function toContent(){
        return $this->belongsToMany('App\article_content','attr_article_content','article','content')->orderBy('ordered');
    }
    public function posts()
    {
        return $this->hasOne('App\articlegroup');
    }
}
