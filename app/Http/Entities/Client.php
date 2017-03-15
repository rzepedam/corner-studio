<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
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
     * @param string $value '01-01-2010'
     */
    public function setBirthdayAttribute($value)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
