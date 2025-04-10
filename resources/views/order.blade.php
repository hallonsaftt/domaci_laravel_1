@extends('layout')

@section('pageTitle')
    Thank You
@endsection

@section('sourcePage')
    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg shop-cart">
                    <div class="card-body text-center py-5">

                        <div class="mb-4">
                            <i class="fas fa-check-circle" style="font-size: 5rem; color: #9b6fe6;"></i>
                        </div>

                        <h1 class="shop-cart-txt mb-4">Thank You!</h1>

                        <p class="card-txt-des fs-5 mb-4">
                            Your order has been successfully submitted.
                        </p>

                        <p class="card-txt-des mb-4">
                            We appreciate your business and will process your order soon.
                        </p>

                        <p class="card-txt-des mb-5">
                            A confirmation email has been sent to your registered email address.
                        </p>

                        <div class="d-flex justify-content-center gap-3 mt-4">
                            <a href="/" class="btn btn-cart px-4 py-2">Return Home</a>
                            <a href="/" class="btn btn-cart px-4 py-2">Continue Shopping</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .fa-check-circle {
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
    </style>
@endsection
