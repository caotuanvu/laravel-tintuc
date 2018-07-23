<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'category';

    public function loaitin()
    {
        return $this->hasMany('App\Loaitin','id_category');
    }

    public function tintuc()
    {
        return $this->hasManyThrough('App\Tintuc','App\Loaitin','id_category','id_loaitin');
    }

}
