<?php

namespace CornerStudio\Http\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * @var array
     */
    protected $fillable   = [
        'addressable_id', 'addressable_type', 'commune_id', 'address', 'depto', 'block', 'phone1', 'phone2'
    ];

    /**
     * @var bool
     */
    public $timestamps = false;


    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function addressable()
    {
        return $this->morphTo();
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
    public function commune()
    {
        return $this->belongsTo(Commune::class);
    }


    /**
     * @return string 'Palacio Riesco 3819, Pozo Almonte. Región de Tarapacá'
     */
    public function getAddressAttribute($value)
    {
        return $value . ', ' . $this->commune->name . '. ' . $this->commune->province->region->name;
    }
}
