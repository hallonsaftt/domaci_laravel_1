@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="row">
        @foreach($products as $id => $amount)
            <div class="col-md-4 mb-4">
                <a>Product ID: {{ $id }}, Quantity: {{ $amount }}</a>
            </div>
        @endforeach
    </div>
@endsection
