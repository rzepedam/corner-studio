<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'start', 'end'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'start', 'end'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }


    /**
     * @param $value 2017-06-10 12:00
     */
    public function setStartAttribute($value)
    {
        $this->attributes['start'] = $value . ':00';
    }

    /**
     * @param $value 2017-06-10 12:00
     */
    public function setEndAttribute($value)
    {
        $this->attributes['end'] = $value . ':00';
    }
}
