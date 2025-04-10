@extends('layout')

@section('pageTitle')
    {{ $product->name }} - Product Details
@endsection

@section('sourcePage')
    <div class="container my-5">
        <h2 class="text-center text-white mb-4">{{ $product->name }}</h2>

        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <!-- Product Image -->
                <div class="card h-100 shadow-sm custom-bg">
                    <img
                        src="{{ asset('storage/images/' . $product->image) }}"
                        class="card-img-top"
                        alt="{{ $product->name }} Image"
                        style="height: 300px; object-fit: cover; border-radius: 10px;"
                    >
                </div>
            </div>

            <div class="col-md-6 mb-4">
                <!-- Product Details -->
                <div class="card h-100 shadow-sm custom-bg">
                    <div class="card-body">
                        <h5 class="card-title text-center text-white">{{ $product->name }}</h5>
                        <p class="card-txt-des text-center">{{ $product->description }}</p>
                        <div class="d-flex justify-content-between mt-3">
                            <p class="fs-6 m-0 card-txt-des">Price:</p>
                            <h5 class="shop-cart-txt">{{ $product->price }}&euro;</h5>
                        </div>

                        <!-- Product Quantity with Badge -->
                        <div class="d-flex justify-content-between mt-3">
                            <p class="fs-6 m-0 card-txt-des">Quantity:</p>
                            @if($product->amount < 10)
                                <span class="badge bg-danger text-white p-2" style="font-size: 14px; animation: blink 1s linear infinite;">Low Stock ({{ $product->amount }})</span>
                            @else
                                <span class="badge bg-success text-white p-2" style="font-size: 14px;">In Stock ({{ $product->amount }})</span>
                            @endif
                        </div>

                        <!-- Add to Cart Form -->
                        <form method="POST" action="{{ route('cart.add') }}" class="mt-3">
                            @csrf
                            <input type="hidden" name="id" value="{{ $product->id }}">
                            <div class="mb-3">
                                <input type="number" name="amount" placeholder="Enter Quantity" class="form-control custom-input" required min="1" max="{{ $product->amount }}">
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-purple btn-lg">Add to Cart</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        @keyframes blink {
            50% {
                opacity: 0;
            }
        }
    </style>
@endsection
