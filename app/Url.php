<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    protected $guarded = array('id');

    public function getData() {
        return $this->id . ':' . $this->url . ':' . $this->comment;
    }

    public function genres() {
        return $this->belongsToMany('App\Genre');
    }
}
