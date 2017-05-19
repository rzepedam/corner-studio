<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Assistance extends Model
{
    protected $fillable = [
        'rut', 'created_at'
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
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
        return $this->created_at->format('h:i:s');
    }
}
