<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'activity_id', 'rut', 'created_at'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $dates = [
        'created_at'
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
     * @param $query
     * @param $activity
     */
    public function scopeActivity($query, $activity)
    {
        dd($activity);
        if ( ! is_null($activity) )
        {
            $query->whereHas('client.subscriptions.activities', function ($query) use ($activity)
            {
                $query->where('activity_id', $activity);
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
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    /**
     * @return mixed '23-09-2001'
     */
    public function getDateAttribute()
    {
        return $this->created_at->format('d-m-Y');
    }

    /**
     * @return mixed '11:27:09'
     */
    public function getHourAttribute()
    {
        return $this->created_at->format('H:i:s');
    }
}
