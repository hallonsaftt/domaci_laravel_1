@extends('layout')

@section('pageTitle')
    Cart
@endsection

@section('sourcePage')
    <div class="container my-5">
        <h2 class="mb-4">🛒 Your Shopping Cart</h2>

        <div class="row">
            <!-- Products Table -->
            <div class="col-lg-8 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        @if(count($combinedItems) > 0)
                            <div class="table-responsive">
                                <table class="table align-middle">
                                    <thead class="table-light">
                                    <tr>
                                        <th>Product</th>
                                        <th style="width: 150px;">Quantity</th>
                                        <th>Price</th>
                                        <th>Total</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($combinedItems as $item)
                                        <tr>
                                            <td>{{ $item['name'] }}</td>
                                            <td>
                                                <div class="input-group">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button">−</button>
                                                    <input type="text" class="form-control text-center" value="{{ $item['amount'] }}">
                                                    <button class="btn btn-outline-secondary btn-sm" type="button">+</button>
                                                </div>
                                            </td>
                                            <td>${{ number_format($item['price'], 2) }}</td>
                                            <td>${{ number_format($item['total'], 2) }}</td>
                                            <td>
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="/shop" class="btn btn-outline-secondary">
                                    <i class="fas fa-arrow-left me-2"></i>Continue Shopping
                                </a>
                                <form method="POST" action="/cart/clear">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Clear Cart</button>
                                </form>
                            </div>
                        @else
                            <div class="text-center p-5">
                                <h4 class="mb-3">Your cart is empty 🛍️</h4>
                                <a href="/shop" class="btn btn-primary">Browse Products</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="mb-3">Order Summary</h5>

                        <div class="d-flex justify-content-between mb-2">
                            <span>Subtotal:</span>
                            <span>${{ number_format($subtotal ?? 0, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Shipping:</span>
                            <span>${{ number_format($shipping ?? 0, 2) }}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tax:</span>
                            <span>${{ number_format($tax ?? 0, 2) }}</span>
                        </div>

                        <hr>

                        <div class="d-flex justify-content-between fw-bold mb-4">
                            <span>Total:</span>
                            <span>${{ number_format($total ?? 0, 2) }}</span>
                        </div>

                        <a href="/cart/finish" class="btn btn-primary w-100 mb-2">Proceed to Checkout</a>
                        <a href="/" class="btn btn-outline-primary w-100">Continue Shopping</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
