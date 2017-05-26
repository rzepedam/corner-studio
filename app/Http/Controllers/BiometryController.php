<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Http\Request;
use CornerStudio\Http\Entities\Biometry;

class BiometryController extends Controller
{
    /**
     * @var Biometry
     */
    protected $biometry;

    /**
     * BiometryController constructor.
     *
     * @param Biometry $biometry
     */
    public function __construct(Biometry $biometry)
    {
        $this->biometry = $biometry;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $biometries = $this->biometry->all();

        return view('biometries.index', compact('biometries'));
    }
}
