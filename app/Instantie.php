<?php

namespace App;

use App\Scan;
use App\Instantiemodel;
use Illuminate\Database\Eloquent\Model;

class Instantie extends Model
{
	protected $fillable = [
		'title',
		'blurb', 
		'scan_id'
	];

    public static function register(Scan $scan, Instantiemodel $instantiemodel)
    {
        $instantie = new Instantie($instantiemodel->toArray());
        $instantie->scan_id = $scan->id;
        $instantiemodel->instanties()->save($instantie);
    }

    public function scan()
    {
    	return $this->belongsTo('App\Scan');
    }

    public function participants()
    {
    	return $this->belongsToMany('App\User');
    }

    public function instantiemodel()
    {
        return $this->belongsTo('App\Instantiemodel');
    }
}
