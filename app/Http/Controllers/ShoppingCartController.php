<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Routing\Controller;

class ShoppingCartController extends Controller
{
//    public function cart()
//    {
//
//        $allProducts = [];
//
//        foreach (Session::get('product') as $cartItem)
//        {
//            $allProducts[] = $cartItem['product_id'];
//        }
//
//        $products = ShopModel::whereIn('id', $allProducts)->get();
//
//        return view('cart', [
//            'cart' => Session::get('product'),
//            'products' => $products,
//        ]);
//    }

    public function cart()
    {
        $combined = [];

        foreach (Session::get('product') as $item) {

            $product = ShopModel::firstWhere(['id' => $item['product_id']]);

            if ($product) {
                $combined[] = [
                    'name' => $product->name,
                    'amount' => $item['amount'],
                    'price' => $product->price,
                    'total' => $item["amount"] * $product->price,
                ];

            }
        }

        return view("cart", [
            "combinedItems" => $combined,
        ]);
    }


    public function addToCart(CartAddRequest $request)
    {
        $product = ShopModel::where(['id' => $request->id])->first();

        if($product->amount < $request->amount)
        {
            return redirect()->back();
        }

        Session::push('product', [
            'product_id' => $request->id,
            'amount' => $request->amount,
        ]);

        return redirect()->route('cart');
    }

}
