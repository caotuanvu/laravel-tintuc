<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';

    public function user()
    {
        return $this->belongsTo('App\User','id_user','id');
    }
    public function tintuc()
    {
        return $this->belongsTo('App\Tintuc','id_tintuc');
    }
}
