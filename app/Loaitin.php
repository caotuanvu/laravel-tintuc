<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Loaitin extends Model
{
    //
    protected $table = 'loaitin';

    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }

    public function tintuc()
    {
        return $this->hasMany('App\Tintuc','id_loaitin');
    }
}
