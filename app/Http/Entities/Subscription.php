<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use CornerStudio\Traits\DatesTranslator;

class Subscription extends Model
{
    use DatesTranslator;

    /**
     * @var array
     */
    protected $fillable = [
        'client_id', 'payment_id', 'end_date', 'num_voucher', 'payday'
    ];

    /**
     * @var array
     */
    protected $dates = [
        'end_date'
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function activities()
    {
        return $this->belongsToMany(Activity::class);
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
    public function getEndDateAttribute($value)
    {
        return Date::parse($value)->format('l j F Y');
    }

    /**
     * @return string '15 días'
     */
    public function getEndDateDiffInDaysAttribute()
    {
        return Carbon::parse($this->getOriginal('end_date'))->diffInDays() . ' días';
    }

    /**
     * @return string 'Vigente or Caducado'
     */
    public function getStateAttribute()
    {
        return ($this->getOriginal('end_date') > Carbon::now()->format('Y-m-d')) ? 'Vigente' : 'Caducado';
    }
}
