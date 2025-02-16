<?php

namespace App\Http\Controllers;

use App\Models\AddProductModel;
use Illuminate\Http\Request;

class AddProductController extends Controller
{
    public function index()
    {
        return view('/add-product');
    }



    }
}
