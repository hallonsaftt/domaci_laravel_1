<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $sat = date("H");

        $trenutnovreme = date('H:i:s');
        return view('welcome', compact('trenutnovreme', 'sat'));
    }
}
