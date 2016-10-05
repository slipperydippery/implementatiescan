<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scan extends Model
{
    use SoftDeletes;

    protected $fillable = [
    	'title',
    	'blurb',
    	'user_id',
        'regio',
    	'scanmodel_id',
        'value',
        'datedeeleen',
        'timedeeleen',
        'deeleencomplete',
        'datedeeltwee',
        'timedeeltwee',
        'deeltweecomplete',
    ];
    
    protected $dates = ['deleted_at'];

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

    public function verbeteracties()
    {
        return $this->hasMany('App\Verbeteractie');
    }

    public function prebeteracties()
    {
        return $this->hasMany('App\Prebeteractie');
    }

}
