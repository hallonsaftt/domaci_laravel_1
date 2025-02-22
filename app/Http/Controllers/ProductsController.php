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


//    public function update(Request $request, $id)
//    {
//        // Validacija podataka
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'description' => 'required|string',
//            'price' => 'required|numeric',
//            'amount' => 'required|integer',
//        ]);
//
//        $product = ShopModel::findOrFail($id);
//        $product->update($validatedData);
//
//        return redirect()->back()->with('success', 'Product updated successfully');
//    }


    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'amount' => 'required|integer',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:50000', // nova validacija
        ]);

        $product = ShopModel::findOrFail($id);


        if($request->hasFile('image')) {


            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $product->update($validatedData);

        return redirect()->back()->with('success', 'Proizvod je uspešno ažuriran.');
    }




//    public function productUpdate(Request $request, $id)
//    {
//        $validatedData = $request->validate([
//            'name'        => 'required|string|max:255',
//            'description' => 'required|string',
//            'price'       => 'required|numeric',
//            'amount'      => 'required|integer',
//            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
//        ]);
//
//        $product = ShopModel::findOrFail($id);
//
//
//        if ($request->hasFile('image')) {
//            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
//            $request->file('image')->storeAs('images', $imageName, 'public');
//            $validatedData['image'] = $imageName;
//        }
//
//        $product->update($validatedData);
//
//        return redirect()->route('test-edit-product', ['id' => $id])
//            ->with('success', 'Uspesno azuriran proizvod.');
//    }







}
