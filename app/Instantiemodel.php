<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instantiemodel extends Model
{
    public function scanmodel()
    {
    	return $this->belongsTo('App\Scanmodel');
    }

    public function instanties()
    {
    	return $this->hasMany('App\Instantie');
    }
}
