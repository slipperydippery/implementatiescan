<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
    	'title',
    	'blurb',
    	'user_id',
        'regio',
    	'scanmodel_id',
        'value'
    ];

    public function scanmodel()
    {
        return $this->belongsTo('App\Scanmodel');
    }

    public function answers()
    {
        return $this->morphMany('App\Answer', 'answerable');
    }  

    public function beheerder()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function participants()
    {
        return $this->belongsToMany('App\User');
    }

    public function instanties()
    {
        return $this->hasMany('App\Instantie');
    }  

}
