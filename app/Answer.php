<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    public function answerable()
    {
    	return $this->morphTo();
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
