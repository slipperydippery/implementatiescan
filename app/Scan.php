<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Scan extends Model
{
    protected $fillable = [
    	'title',
    	'blurb',
    	'user_id',
    	'scanmodel_id',
    ];

    public function beheerder()
    {
    	return $this->belongsTo(User::class);
    }
}
