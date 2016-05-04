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
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

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
}
