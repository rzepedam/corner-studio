<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'name'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function provinces()
    {
        return $this->hasMany(Province::class);
    }
}
