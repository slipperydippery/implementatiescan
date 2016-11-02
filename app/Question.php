<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
    	return $this->morphMany('App\Answer', 'answerable');
    }

    public function verbeteractie()
    {
    	return $this->hasOne('App\Verbeteractie');
    }

    public function thema()
    {
    	return $this->belongsToMany('App\Thema');
    }
}
