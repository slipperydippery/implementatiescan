<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externaluser extends Model
{
	protected $fillable = [
		'name',
		'verbeteractie_id',
	];

    public function verbeteractie()
    {
    	return $this->belongsTo('App\Verbeteractie');
    }
}
