<?php

namespace App;

use App\User;
use App\Scanmodel;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
    	'title',
    	'blurb',
    	'user_id',
    	'scanmodel_id',
        'value'
    ];

    public function beheerder()
    {
    	return $this->belongsTo(User::class);
    }

    public function scanmodel()
    {
        return $this->belongsTo(Scanmodel::class);
    }

    public function answers()
    {
        return $this->morphMany('App\Answer', 'answerable');
    }  

    public function participants()
    {
        return $this->hasMany('App\User');
    }

    public function instanties()
    {
        return $this->hasMany('App\Instantie');
    }  
}
