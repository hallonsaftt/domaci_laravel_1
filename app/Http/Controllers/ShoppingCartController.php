<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class ShoppingCartController extends Controller
{
    public function addToCart(CartAddRequest $request)
    {
        Session::put("product", [
            $request->id => $request->amount
        ]);

        return redirect("/cart");
    }

    public function cart()
    {
        $products = Session::get('product', []); // uzimamo proizvode iz sesije
        return view("cart", compact('products'));
    }
}
