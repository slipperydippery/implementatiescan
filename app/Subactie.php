<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subactie extends Model
{
    protected $fillable = [
	    'title',
	    'omschrijving',
	    'datum',
	    'verbeteractie_id',
	    'user_id'
    ];
    
    protected $dates = ['deleted_at'];

    public function trekker()
    {
    	return $this->belongsTo('App\User');
    }

    public function betrokkenen()
    {
    	return $this->belongsToMany('App\User');
    }

    public function verbeteractie()
    {
    	return $this->belongsTo('App\Verbeteractie');
    }

    public function externalusers()
    {
    	return $this->hasMany('App\Subexternaluser');
    }
}
