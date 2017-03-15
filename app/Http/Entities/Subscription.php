<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'client_id', 'payment_id', 'plan_id', 'start_date', 'end_date', 'num_voucher', 'payday'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'start_date', 'end_date', 'payday'
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
    public function plan()
    {
    	return $this->belongsTo(Plan::class);
    }


    /**
     * @param string $value '01-01-2010'
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::createFromFormat('d-m-Y', $value);
    }

    /**
     * @param string $value '01-01-2010'
     */
    public function setPaydayAttribute($value)
    {
        $this->attributes['payday'] = Carbon::createFromFormat('d-m-Y', $value);
    }
}
