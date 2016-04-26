<?php

namespace App;

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
}
