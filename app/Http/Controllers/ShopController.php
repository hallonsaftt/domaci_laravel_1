<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {

        $products = [
            "Design UI",
            "Design UX",
            "Make Web Shop for You"
        ];



        return view('shop', compact('products'));
    }
}
