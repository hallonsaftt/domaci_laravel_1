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


    public function update(Request $request, $id)
    {
        // Validacija podataka
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
        ]);

        $product = ShopModel::findOrFail($id);
        $product->update($validatedData);

        return redirect()->back()->with('success', 'Product updated successfully');
    }

}
