<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instrument extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'adress'
    ];

    public function themas()
    {
    	return $this->belongsToMany('App\Thema');
    }
}
