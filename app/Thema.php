<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thema extends Model
{
    protected $fillable = [
    	'title',
    	'blurb',
    	'succesfactor',
    	'weergave_succesfactor',
    	'norm',
    	'video_id'
    ];
      
    public function video()
    {
    	return $this->belongsTo('App\Video');
    }
}
