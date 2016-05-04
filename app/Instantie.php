<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
	protected $fillable = [
		'title',
		'blurb', 
		'scan_id'
	];

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function users()
    {
    	return $this->belongsToMany('App\User');
    }
}
