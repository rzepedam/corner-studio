<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'professional_id', 'name', 'amount', 'start_date', 'end_date'
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
    public function professional()
    {
        return $this->belongsTo(Professional::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value);
    }

    /**
     * @param $value '2017-10-02'
     *
     * @return string '2 meses'
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->diffInMonths() . ' meses';
    }
}
