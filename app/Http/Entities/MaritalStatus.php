<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class MaritalStatus extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
