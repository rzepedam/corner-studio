<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'client_id', 'commune_id', 'address', 'depto', 'block', 'phone1', 'phone2'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;
}
