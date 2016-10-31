<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Scanrequest extends Model
{
    protected $fillable = [
    	'title',
    	'regio',
    	'beheerder_name_first',
    	'beheerder_name_last',
    	'beheerder_email',
    	'beheerder_instantie',
    	'testscan'
    ];
}
