<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verbeteractie extends Model
{
    protected $fillable = [
        'title',
    	'omschrijving',
    	'user_id',
        'question_id',
    	'thema_id',
    	'scan_id'
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function betrokkenen()
    {
        return $this->belongsToMany('App\User');
    }

    public function thema()
    {
        return $this->belongsTo('App\Thema');
    }

    public function subacties()
    {
        return $this->hasMany('App\Subactie');
    }

}
