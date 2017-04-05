<?php

namespace CornerStudio\Http\Controllers;

use CornerStudio\Http\Entities\Province;
use CornerStudio\Http\Entities\Region;

class AjaxController extends Controller
{
    protected $region;

    /**
     * @var Province
     */
    protected $province;

    /**
     * AjaxController constructor.
     *
     * @param Province $province
     * @param Region $region
     */
    public function __construct(Province $province, Region $region)
    {
        $this->province = $province;
        $this->region   = $region;
    }

    /**
     * @return mixed
     */
    public function loadCommunes()
    {
        return $this->province->findOrFail(request('id'))->communes->pluck('name', 'id');
    }

    /**
     * @return mixed
     */
    public function loadProvinces()
    {
        return $this->region->findOrFail(request('id'))->provinces->pluck('name', 'id');
    }
}
