<?php

namespace App\Http\Controllers;

use App\Models\ShopModel;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $allProducts = ShopModel::all();


        return view('/all-products', compact('allProducts'));
    }

    public function deleteProduct($product)
    {
        $singleProduct = ShopModel::where(['id' => $product])->first();


        if($singleProduct === null)
        {
            die("Product not found");
        }


        $singleProduct->delete();

        return redirect()->back();


    }
}
