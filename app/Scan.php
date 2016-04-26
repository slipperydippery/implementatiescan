<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
    	'name'
    ];

    public function themas()
    {
    	return $this->belongsToMany('App\Thema');
    }
}
