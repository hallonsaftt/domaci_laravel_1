@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="container my-4">
        <h3 class="mb-4">🛒 Your Cart</h3>

        @foreach($cart as $product)
            @if(is_array($product) && isset($product['product_id'], $product['amount']))
                <p>Product ID: {{ $product['product_id'] }}</p>
                <p>Quantity: {{ $product['amount'] }}</p>
            @else
                <p style="color:red;">⚠️ Neispravan unos: {{ json_encode($product) }}</p>
            @endif
        @endforeach



    </div>
@endsection
