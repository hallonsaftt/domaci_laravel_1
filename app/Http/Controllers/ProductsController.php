<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveProductRequest;
use App\Models\ShopModel;
use App\Repositories\ProductRepositories;
use Illuminate\Http\Request;
use Tests\Fixtures\Models\Product;

class ProductsController extends Controller
{
    private $productRepo;

    public function __construct()

    {
        $this->productRepo = new ProductRepositories();
    }
    public function index()
    {
        $allProducts = ShopModel::all();


        return view('/all-products', compact('allProducts'));
    }

    public function deleteProduct($product)
    {
//        $singleProduct = ShopModel::where(['id' => $product])->first();
        $singleProduct = $this->productRepo->deleteProduct($product);

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


    public function update(SaveProductRequest $request, $id)
    {
//        $validatedData = $request->validate([
//            'name' => 'required|string|max:255',
//            'description' => 'required|string',
//            'price' => 'required|numeric',
//            'amount' => 'required|integer',
//            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:50000', // nova validacija
//        ]);

        $validatedData = $request->validated();

        $product = ShopModel::findOrFail($id);


        if($request->hasFile('image')) {


            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $validatedData['image'] = $imageName;
        }

        $product->update($validatedData);

        return redirect()->back()->with('success', 'Proizvod je uspešno ažuriran.');
    }


    public function singleProduct(Request $request, ShopModel $product)
    {

        return view('products/edit', compact('product'));
    }


    public function saveProduct(Request $request, ShopModel $product)
    {

        $product->name = $request->get('name');
        $product->description = $request->get('description');
        $product->amount = $request->get('amount');
        $product->price = $request->get('price');

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('images', $imageName, 'public');
            $product->image = $imageName;
        }


        $product->save();

        return redirect()->back();

    }






}
