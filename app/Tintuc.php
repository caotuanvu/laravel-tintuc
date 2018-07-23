<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tintuc extends Model
{
    //
    protected $table = 'tintuc';

    public function comment()
    {
        return $this->hasMany('App\Comment','id_tintuc');
    }
    public function loaitin()
    {
        return $this->belongsTo('App\Loaitin','id_loaitin');
    }
    // 1 tin tức có nhiều comment- 1 tin tức có nhiều user comment - 1 comment thì thuộc về 1 user
}
