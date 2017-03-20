<?php

namespace CornerStudio\Traits;

use Jenssegers\Date\Date;

trait DatesTranslator
{
    public function getCreatedAtAttribute($created_at)
    {
        return Date::parse($created_at)->format('l j F Y');
    }
}