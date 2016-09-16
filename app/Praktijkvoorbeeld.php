<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Praktijkvoorbeeld extends Model
{
    protected $fillable = [
    	'title',
    	'description',
    	'adress',
    	'bedrijven',
    	'scholen',
    	'gemeenten',
    	'overig',
    ];

    public function themas()
    {
    	return $this->belongsToMany('App\Thema');
    }
}
