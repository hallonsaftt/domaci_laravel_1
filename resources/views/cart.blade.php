@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="container my-4">
        <h3 class="mb-4">🛒 Your Cart</h3>

        <div class="row">
            <!-- Left column - Products table -->
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Product Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($combinedItems as $item)

                                            <tr>
                                                <td>{{ $item['name'] }}</td>
                                                <td>
                                                    <div class="input-group" style="width: 120px;">
                                                        <button class="btn btn-outline-secondary" type="button">-</button>
                                                        <input type="text" class="form-control text-center" value="{{ $item['amount'] }}">
                                                        <button class="btn btn-outline-secondary" type="button">+</button>
                                                    </div>
                                                </td>
                                                <td>${{ $item['price'] }}</td>
                                                <td>${{ $item['total'] }}</td>
                                                <td>
                                                    <button class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="d-flex justify-content-between mt-3">
                            <a href="/shop" class="btn btn-outline-secondary">
                                <i class="fas fa-arrow-left me-2"></i>Back to Shop
                            </a>
                            <button class="btn btn-outline-danger">Clear Cart</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right column - Order summary -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Order Summary</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span></span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span>Tax:</span>
                            <span></span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold mb-4">
                            <span>Total:</span>
                            <span></span>
                        </div>
                        <button class="btn btn-primary w-100 mb-2">
                            Proceed to Checkout
                        </button>
                        <button class="btn btn-outline-primary w-100">
                            Continue Shopping
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
