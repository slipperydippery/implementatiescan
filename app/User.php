<?php

namespace App;

use App\Role;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'email', 
        'password',
        'active',
        'confirmed',
        'confirmation_code',
        'name_first', 
        'name_last', 
        'last_online',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function register($attributes)
    {
        if(User::where('email', '=', $attributes['email'])->get()->count()){
            $user = User::where('email', '=', $attributes['email'])->first();
        } else {
            $user = static::create($attributes);
            $user->initial_pwd = str_random(8);
            $user->password = bcrypt($user->initial_pwd);
            $user->save();
        }
        return $user;
    }

    public function addInstantieByModelid($modelid, Scan $scan)
    {
        $instantie = $scan->instanties()->where('instantiemodel_id', '=', $modelid)->first();
        $this->instanties()->save($instantie);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole ($role)
    {
        return $this->roles()->save(
            Role::whereName($role)->firstOrFail()

        );
        // return $this->roles->save($role);
    }

    // user->hasRole('manager')
    public function hasRole($role)
    {
        if (is_string($role))
        {
            return $this->roles->contains('name', $role);
        }

        return !! $role->intersect($this->roles)->count();
    }

    public function scans()
    {
        return $this->belongsToMany('App\Scan');
    }

    public function instanties()
    {
        return $this->belongsToMany('App\Instantie');
    }

    public function beheert()
    {
        return $this->hasMany('App\Scan');
    }

    public function answers()
    {
        return $this->hasMany('App\Answer');
    }  

    public function betrektVerbeteracties()
    {
        return $this->belongsToMany('App\Verbeteractie');
    }

    public function trektVerbeteracties()
    {
        return $this->hasMany('App\Verbeteractie');
    }

    public function betrektSubacties()
    {
        return $this->belongsToMany('App\Subactie');
    }

    public function trektSubacties()
    {
        return $this->hasMany('App\Subactie');
    }
}
