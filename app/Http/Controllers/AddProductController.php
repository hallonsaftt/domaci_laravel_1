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


    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'amount' => 'required',
            'price' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $uploadedFile = $request->file('image');
        $filename = time() . '.' . $uploadedFile->getClientOriginalExtension();
        $uploadedFile->move(public_path('images'), $filename);

        // Upis u bazu
        AddProductModel::create([
            'name'        => $request->get('name'),
            'description' => $request->get('description'),
            'amount'      => $request->get('amount'),
            'price'       => $request->get('price'),
            'image'       => $filename // čuvamo ime fajla
        ]);


// Provera isopisa
//        echo "Name: ".$request->get('name')."<br>";
//        echo "Description: ".$request->get('description')."<br>";
//        echo "Amount: ".$request->get('amount')."<br>";
//        echo "Price: ".$request->get('price')."<br>";
//
//
//        $path = public_path('images') . '/' . $filename;
//        echo "Path: " . $path . "<br>";
//        echo "FileName: " . $filename . "<br>";
//
//        // Prikaz slike (URL je /images/imeFajla)
//        echo "<img src='" . asset('images/' . $filename) . "' width='200' />";
    }


}
