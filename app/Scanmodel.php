<?php

namespace App;

use App\Video;
use Illuminate\Database\Eloquent\Model;

class Scanmodel extends Model
{
	protected $fillable = [
		'title',
		'blurb'
	];

    public function themas()
    {
    	return $this->belongsToMany('App\Thema');
    }

    public function video()
    {
    	return $this->belongsTo('App\Video');
    }
}
