<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subexternaluser extends Model
{
	protected $fillable = [
		'name',
		'subactie_id',
	];

    public function subactie()
    {
    	return $this->belongsTo('App\Subactie');
    }
}
