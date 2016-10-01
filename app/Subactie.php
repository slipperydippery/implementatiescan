<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subactie extends Model
{
    protected $fillable = [
	    'title',
	    'omschrijving',
	    'verbeteractie_id',
	    'user_id'
    ]
}
