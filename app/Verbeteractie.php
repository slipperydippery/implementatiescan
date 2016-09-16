<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Verbeteractie extends Model
{
    protected $fillable = [
    	'omschrijving',
    	'user_id',
    	'thema_id',
    	'scan_id',
    ];

    public function question()
    {
        return $this->belongsTo('App\Question');
    }

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function betrokkenen()
    {
    	return $this->belongsToMany('App\User');
    }

    public function trekker()
    {
    	return $this->belongsTo('App\User');
    }

    public function thema()
    {
        return $this->belongsTo('App\Thema');
    }

}
