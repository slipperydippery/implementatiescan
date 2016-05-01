<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function answers()
    {
    	return $this->morphMany('App\Answer', 'answerable');
    }
}
