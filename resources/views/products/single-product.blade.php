
@extends('layout')

@section('pageTitle')
    Product
@endsection

@section('sourcePage')
    <p>{{ $product->name }}</p>
    <form method="POST" action="{{route("cart.add")}}">
        @csrf
        <input type="hidden" name="id" value="{{ $product->id }}">
        <input type="text" name="amount" placeholder="Enter Amount">
        <button>Add to cart</button>
    </form>
@endsection
