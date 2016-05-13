<?php

namespace App;

use App\Video;
use App\Question;
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

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    public function verbeteracties()
    {
        return $this->hasMany('App\Verbeteractie');
    }

    public function prebeteracties()
    {
        return $this->hasMany('app\Prebeteractie');
    }
}
