<?php

namespace CornerStudio\Http\Entities;

use Carbon\Carbon;
use Jenssegers\Date\Date;
use Illuminate\Database\Eloquent\Model;
use CornerStudio\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use DatesTranslator, SoftDeletes;

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
        'end_date', 'deleted_at'
    ];

    /**
     * @param $query
     * @param $search
     */
    public function scopeName($query, $search)
    {
        if ( ! is_null($search) )
        {
            $query->whereHas('client', function ($query) use ($search)
            {
                $query->where('full_name', "LIKE", "%$search%");
            });
        }
    }

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
     *
     * @return string '20-07-1978'
     */
    public function getEndDateAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    /**
     * @return string 'jueves 20 julio 1978'
     */
    public function getTextEndDateAttribute()
    {
        return Date::parse($this->end_date)->format('l j F Y');
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
