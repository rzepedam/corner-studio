<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'name', 'amount'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
