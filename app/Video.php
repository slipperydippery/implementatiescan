<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $fillable = [
    	'title',
    	'blurb',
    	'adress'
    ];

    public function scan()
    {
    	return $this->hasMany('App\Thema');
    }
}


