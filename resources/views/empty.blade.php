@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="container my-5 center">
        <h2 class="mb-4">🛒 Your Shopping Cart</h2>

        <div class="row">
            <!-- Products Table -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mt-4">
                            <div class="text-center p-5">
                                <h4 class="mb-3">Your cart is empty 🛍️</h4>
                                <a href="/" id="browseButton" class="btn btn-primary">Browse Products</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
