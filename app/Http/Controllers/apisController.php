<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class apisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Retornamos vista
        return view('apis.show');
    }

}
