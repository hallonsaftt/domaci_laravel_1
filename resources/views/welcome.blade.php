@extends('layout')


@section('pageTitle')
    Amx sell
@endsection

@section('sourcePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">🔥HOT last <b>6</b> products </h2>
        <p class="text-center mb-4">Be first one who bought this!</p>

        <div class="row">
            @foreach($lastSixProducts as $lastProduct)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm shop-cart">
                        <!-- Slika-->
                        <img
                            src="{{ asset('storage/images/' . $lastProduct->image) }}"
                            class="card-img-top"
                            alt="Product Image"
                            style="height: 200px; object-fit: cover; padding: 0rem; border-radius-topleft: 10px;"
                        >
                        <!--kartice -->
                        <div class="card-body">
                            <h5 class="card-title">{{ $lastProduct->name }}</h5>
                            <p class="card-txt-des">{{ $lastProduct->description }}</p>
                            <p class="fs-8 m-0">Price:</p>
                            <h5 class="shop-cart-txt">{{ $lastProduct->price }}&euro;</h5>
{{--                            <a href="{{ route('product.permalink', ['product' => $product->id]) }}" class="btn btn-cart mt-2">View product</a>--}}
                            <a href="{{ route('product.permalink', ['product' => $lastProduct->id]) }}" class="btn btn-cart mt-2">View product</a>

                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

    <style>
        .blink {
            animation: blinker 2.5s linear infinite;
        }
        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>

{{--    <form method="post" action="/send-contact">--}}

{{--        @if($errors->any())--}}
{{--            <p>Greska: {{ $errors->first() }}</p>--}}
{{--        @endif--}}

{{--        {{ csrf_field() }}--}}
{{--            <input name="first_name" type="string" placeholder="Enter your first"><br>--}}
{{--            <input name="last_name" type="string" placeholder="Enter your last"><br>--}}
{{--        <input name="email" type="email" placeholder="Enter your email"><br>--}}
{{--        <input name="subject" type="text" placeholder="Enter subject"><br>--}}
{{--        <textarea name="description"></textarea><br>--}}
{{--        <button>Send</button>--}}
{{--    </form>--}}



@endsection

