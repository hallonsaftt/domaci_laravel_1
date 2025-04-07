<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    public function index()
    {
        $lastSixProducts = ShopModel::orderBy('id', 'desc')->take(6)->get();

        return view('welcome', compact('lastSixProducts'));
    }
        ///trooob
    ///
    ///
    public function permalink(ShopModel $product)
    {
        return view('products/single-product', compact('product'));
    }

}
