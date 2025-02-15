<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lastSixProducts = ShopModel::orderBy('id', 'desc')->take(6)->get();

        return view('welcome', compact('lastSixProducts'));
    }

    //fin

    public function ggsell()
    {
        return view('ggsell');
    }
}
