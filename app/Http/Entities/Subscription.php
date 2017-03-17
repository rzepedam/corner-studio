<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'client_id', 'payment_id', 'start_date', 'end_date', 'num_voucher', 'payday'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_date', 'end_date'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
    	return $this->belongsTo(Client::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }


    public function setStartDateAttribute()
    {
        $this->attributes['start_date'] = Carbon::now()->format('Y-m-d');
    }

    /**
     * @param string $value '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param $value '1978-07-20'
     * @return string 'jueves 20 julio 1978'
     */
    public function getStartDateAttribute($value)
    {
        return Date::parse($value)->format('l j F Y');
    }

    /**
     * @param $value '1978-07-20'
     * @return string 'jueves 20 julio 1978'
     */
    public function getEndDateAttribute($value)
    {
        return Date::parse($value)->format('l j F Y');
    }

    public function getStateAttribute()
    {
        return ($this->getOriginal('end_date') > Carbon::now()->format('Y-m-d')) ? 'Vigente' : 'Caducado';
    }
}
