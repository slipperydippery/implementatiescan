<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Externaluser extends Model
{
    public function verbeteractie()
    {
    	return $this->belongsTo('App\Verbeteractie');
    }
}
