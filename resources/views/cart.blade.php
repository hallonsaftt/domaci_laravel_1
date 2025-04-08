@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="container my-4">
        <h3 class="mb-4">🛒 Your Cart</h3>

        @foreach($products as $product)

            <div class="cart-conatiner">
                    <span>{{ $product->name }}</span>
                    <span>{{ $product->amount }}</span>
                </div>
        @endforeach



    </div>
@endsection
