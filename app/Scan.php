<?php

namespace App;

use App\User;
use App\Instantie;
use App\Verbeteractie;
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
        'testscan',
    ];
    
    protected $dates = ['deleted_at'];

    public static function register(User $user, $attributes)
    {
        $scan = new Scan($attributes);
        $user->beheert()->save($scan);
        $user->scans()->Save($scan);
        $scan->registerInstanties();
        $user->addInstantieByModelid($attributes['instantie'], $scan);
        $scan->registerVerbeteracties();
        return $scan;
    }

    public function registerInstanties()
    {
        foreach($this->scanmodel->instantiemodels as $instantiemodel)
        {
            Instantie::register($this, $instantiemodel);
        }
    }

    public function registerVerbeteracties()
    {
        foreach($this->scanmodel->themas as $thema)
        {
            foreach($thema->questions as $question)
            {
                Verbeteractie::register([
                    'user_id' => null,
                    'scan_id' => $this->id,
                    'question_id' => $question->id,
                    'title' => $question->title,
                    'thema_id' => $thema->id,
                ]);
            }
        }
    }

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

    public function consultants()
    {
        return $this->belongsToMany('App\User', 'consultants', 'scan_id', 'user_id');
    }

}
