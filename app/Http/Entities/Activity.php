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
        'professional_id', 'name', 'amount', 'start_date', 'end_date', 'color'
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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d H:i');
    }

    /**
     * @param string '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d H:i');
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
