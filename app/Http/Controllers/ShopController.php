<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index()
    {


        $allProducts = ShopModel::all();


        return view('shop', compact('allProducts'));
    }

    public function AdminProducts()
    {
        $AdminProducts = ShopModel::all();

        return view('admin-products', compact('AdminProducts'));
    }


}
