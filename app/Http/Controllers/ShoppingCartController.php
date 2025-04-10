<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartAddRequest;
use App\Models\OrderItems;
use App\Models\Orders;
use App\Models\ShopModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        $cart = Session::get('product');

        if($cart < 1){
//            return redirect('/');
            return view('empty');
        }


        $combined = [];

        foreach (Session::get('product') as $item) {

            $product = ShopModel::firstWhere(['id' => $item['product_id']]);

            if ($product) {
                $combined[] = [
                    'product_id' => $product->id,
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


    public function finishOrder()
    {

        $cart = Session::get('product');

        if (!is_array($cart) || empty($cart)) {

            return view('empty');
        }

        $totalCartPrice = 0;

        foreach ($cart as $item){
            $product = ShopModel::firstWhere(['id' => $item['product_id']]);
            $totalCartPrice += $item['amount'] * $product->price;

            if($item['amount'] > $product->amount )
            {
                return redirect()->back();
            }

        }

        $order = Orders::create([
            'user_id' => Auth::id(),
            'price' => $totalCartPrice,
        ]);


        foreach ($cart as $item){
            $product = ShopModel::firstWhere(['id' => $item['product_id']]);
            $product->amount -= $item['amount'];
            $product->save();

            OrderItems::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'amount' => $item['amount'],
                'price' => $item['amount'] * $product->price,
            ]);

        }

        Session::remove('product');


//        return view('thank-you');
        return view('order')->with('msg', 'Test radi');





    }
}
