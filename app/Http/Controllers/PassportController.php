<?php

namespace CornerStudio\Http\Controllers;

use Illuminate\Http\Request;

class PassportController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('passport');
    }
}
