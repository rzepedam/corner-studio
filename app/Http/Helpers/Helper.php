<?php

namespace CornerStudio\Http\Helpers;

class Helper
{
    public static function rut($rut)
    {
        $rutTmp = explode('-', $rut);

        return number_format($rutTmp[0], 0, '', '.') . '-' . $rutTmp[1];
    }

    /**
     * @param $field 20000
     *
     * @return string 20.000
     */
    public static function decimalNumber($field)
    {
        return number_format($field, 0, ',', '.');
    }
}