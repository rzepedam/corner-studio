<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use CornerStudio\Http\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'country_id', 'marital_status_id', 'male_surname', 'female_surname', 'first_name',
        'second_name', 'full_name', 'rut', 'birthday', 'is_male', 'email'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'birthday'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function maritalStatus()
    {
    	return $this->belongsTo(MaritalStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function country()
    {
    	return $this->belongsTo(Country::class);
    }


    /**
     * @param string $value format 12.345.678-9
     */
    public function setRutAttribute($value)
    {
        $this->attributes['rut'] = str_replace('.', '', $value);
    }

    /**
     * @param string $value '01-01-2010'
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::parse($value)->format('Y-m-d');
    }

    /**
     * @param $value (1 or 0)
     *
     * @return bool
     */
    public function setIsMaleAttribute($value)
    {
        if ( '1' === $value )
        {
            return $this->attributes['is_male'] = true;
        }

        return $this->attributes['is_male'] = false;
    }

    public function setFullNameAttribute()
    {
        $this->attributes['full_name'] = $this->first_name . ' ' . $this->second_name . ' ' . $this->male_surname . ' ' . $this->female_surname;
    }

    /**
     * @param $value '12345678-9'
     *
     * @return mixed '12.345.678-9'
     */
    public function getRutAttribute($value)
    {
        return Helper::rut($value);
    }

    /**
     * @param $value '1978-07-20'
     * @return string 'jueves 20 julio 1978'
     */
    public function getBirthdayAttribute($value)
    {
        return Date::parse($value)->format('l j F Y');
    }

    /**
     * @param $value '0 or 1'
     * @return string 'Masculino or Femenino'
     */
    public function getIsMaleAttribute($value)
    {
        return $value ? 'Masculino' : 'Femenino';
    }

}
