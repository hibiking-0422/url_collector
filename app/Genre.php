<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded = array('id');

    public function urls() {
        return $this->belongsToMany('App\Url');
    }
}
