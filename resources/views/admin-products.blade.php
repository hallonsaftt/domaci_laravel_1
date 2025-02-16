@extends('layout')

@section('pageTitle')
    Admin | Products
@endsection

@section('sourcePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">Products</h2>

        <!-- Omotaćemo tabelu div-om koji ima shop-cart klasu
             da bi dobio tamnu pozadinu i ljubičaste okvire. -->
        <div class="table-responsive shop-cart p-3" style="border-radius: 10px;">
            <table class="table align-middle text-white">
                <thead>
                <tr style="border-bottom: 1px solid #371c6c;">
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price (&euro;)</th>
                    <th scope="col">Amount</th>
                </tr>
                </thead>
                <tbody>
                @foreach($AdminProducts as $product)
                    <tr style="border-bottom: 1px solid #371c6c;">
                        <!-- Slika proizvoda -->
                        <td>
                            <img
                                src="{{ asset('images/' . $product->image) }}"
                                alt="Product Image"
                                style="width: 100px; height: auto; object-fit: cover;"
                            >
                        </td>
                        <!-- Naziv proizvoda -->
                        <td class="card-txt-des">{{ $product->name }}</td>
                        <!-- Opis proizvoda -->
                        <td class="card-txt-des">{{ $product->description }}</td>
                        <!-- Cena -->
                        <td class="shop-cart-txt">{{ $product->price }}</td>
                        <!-- Količina (amount) -->
                        <td class="shop-cart-txt">{{ $product->amount }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
