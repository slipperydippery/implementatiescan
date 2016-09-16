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

    public function scanmodel()
    {
        return $this->belongsTo('App\Scanmodel');
    }

    public function questions()
    {
        return $this->belongsToMany('App\Question');
    }

    public function verbeteracties()
    {
        return $this->hasMany('App\Verbeteractie');
    }

    public function instruments()
    {
        return $this->belongsToMany('App\Instrument');
    }

    public function programmas()
    {
        return $this->belongsToMany('App\Programma');
    }

    public function praktijkvoorbeeld()
    {
        return $this->belongsToMany('App\Praktijkvoorbeeld');
    }

}
