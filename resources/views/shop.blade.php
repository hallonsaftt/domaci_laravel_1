
@extends('layout')

@section('pageTitle')
    Shop page
@endsection

@section('sourcePage')

    @foreach($products as $product)

        @if($product == "Design UI")
            <p>{{ $product }} [SALE 20%]</p>
            @else
            <p>{{ $product }}</p>
        @endif

    @endforeach
@endsection


