
@extends('layout')

@section('pageTitle')
    Shop page
@endsection

@section('sourcePage')

    @foreach($allProducts as $product)

        <h2>{{ $product->name }}</h2>
        <p>Description: {{ $product->description }}</p>
        <h3>Price: {{ $product->price }}€</h3>
{{--        <img src="{{ $product-image }}">--}}
        <br>
        <br>

    @endforeach
@endsection


