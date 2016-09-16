<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Programma extends Model
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
