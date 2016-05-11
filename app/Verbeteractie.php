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

    public function thema()
    {
    	return $this->belongsTo('App\Thema');
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

}
