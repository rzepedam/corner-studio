<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use CornerStudio\Http\Helpers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use SoftDeletes;

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
        'start_date', 'end_date', 'deleted_at'
    ];

    /**
     * @param $query
     * @param $search
     */
    public function scopeName($query, $search)
    {
        if ( ! is_null($search) )
        {
            $query->where('name', "LIKE", "%$search%");
        }
    }

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
     * @param string $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = ucfirst(mb_strtolower($value, 'utf-8'));
    }

    /**
     * @param string '01-01-2010'
     */
    public function setStartDateAttribute($value)
    {
        $this->attributes['start_date'] = Carbon::parse($value)->format('Y-m-d H:i');
    }

    /**
     * @param $value $ 2.000
     */
    public function setAmountAttribute($value)
    {
        $sanitizedMoney             = trim(str_replace('$', '', $value));
        $this->attributes['amount'] = str_replace('.', '', $sanitizedMoney);
    }

    /**
     * @param string '01-01-2010'
     */
    public function setEndDateAttribute($value)
    {
        $this->attributes['end_date'] = Carbon::parse($value)->format('Y-m-d H:i');
    }

    /**
     * @param $value '2017-09-10
     *
     * @return string '10-09-2017'
     */
    public function getStartDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @param $value '2017-09-10
     *
     * @return string '10-09-2017'
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @return string 'jueves 20 julio 1978'
     */
    public function getTextStartDateAttribute()
    {
        return Date::parse($this->start_date)->format('l j F Y');
    }

    /**
     * @return string 'jueves 20 julio 1978'
     */
    public function getTextEndDateAttribute()
    {
        return Date::parse($this->end_date)->format('l j F Y');
    }

    /**
     * @return string '2 meses'
     */
    public function getDiffEndDateAttribute()
    {
        return Carbon::parse($this->getOriginal('end_date'))->diffInMonths() . ' meses';
    }

    /**
     * @param string 10000
     *
     * @return string 10.000
     */
    public function getAmountAttribute($value)
    {
        return Helper::decimalNumber($value);
    }
}
