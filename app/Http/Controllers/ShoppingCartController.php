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
        $cart = Session::get('cart', []);
        $cart[] = [
            'product_id' => (int) $request->id,
            'amount' => (int) $request->amount
        ];
        Session::put('cart', $cart);

        return redirect()->route('cart');
    }


    public function cart()
    {
        $cart = Session::get('cart', []);
        return view('cart', compact('cart'));
    }

}
