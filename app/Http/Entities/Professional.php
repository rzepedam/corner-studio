<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Professional extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'position_id', 'country_id', 'marital_status_id', 'male_surname', 'female_surname',
        'first_name', 'second_name', 'full_name', 'rut', 'birthday', 'is_male', 'email'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }


    /**
     * @param string $value '01-01-2010'
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::parse($value)->format('Y-m-d');
    }
}
