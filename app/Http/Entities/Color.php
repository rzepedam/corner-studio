<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'color'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
