<?php

namespace CornerStudio;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'male_surname', 'full_name', 'email', 'is_admin', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public function scopeName($query, $search)
    {
        if ( ! is_null($search) )
        {
            $query->where('full_name', "LIKE", "%$search%");
        }
    }


    /**
     * @param string $value
     */
    public function setFirstNameAttribute($value)
    {
        $this->attributes['first_name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string $value
     */
    public function setMaleSurnameAttribute($value)
    {
        $this->attributes['male_surname'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = $this->first_name . ' ' . $this->male_surname;
    }

    /**
     * @param password $value
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * @param string $value
     */
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }

    /**
     * @param $value 1445453.png
     *
     * @return string
     */
    public function getAvatarAttribute($value)
    {
        return is_null($value) ? 'img/profile.png' : 'storage/' . $value;
    }
}
