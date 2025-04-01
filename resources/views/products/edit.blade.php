@extends('layout')


@section('pageTitle')
    Edit product
@endsection

@section('sourcePage')


    <div class="container my-5">
        <div class="row justify-content-center">
            <a href="{{ route('products.all') }}"><button class="btn btn-cart mt-2"><< All product</button></a><br><br><br>
            <div class="col-md-8 col-lg-6 shop-cart p-4">
                <h2 class="mb-4 text-center">Edit [ {{ $product->name }} ]</h2>


{{--                @if(session('success'))--}}
{{--                    <div id="succ-message" class="alert alert-success">--}}
{{--                        {{ session('success') }}--}}
{{--                    </div>--}}
{{--                @endif--}}

{{--                <script>--}}
{{--                    setTimeout(function() {--}}
{{--                        const elem = document.getElementById('succ-message');--}}
{{--                        if (elem) {--}}

{{--                            elem.style.transition = 'opacity 600ms';--}}
{{--                            elem.style.opacity = '0';--}}


{{--                            setTimeout(function() {--}}
{{--                                elem.style.display = 'none';--}}
{{--                            }, 600);--}}
{{--                        }--}}
{{--                    }, 1000);--}}
{{--                </script>--}}


                <!-- Prikaz grešaka validacije (ako postoje) -->
{{--                @if($errors->any())--}}
{{--                    <div class="alert alert-danger">--}}
{{--                        <ul>--}}
{{--                            @foreach($errors->all() as $error)--}}
{{--                                <li style="text-decoration: none;">{{ $error }}</li>--}}
{{--                            @endforeach--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                @endif--}}


                <form action="{{ route('products.save', ['product' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label card-txt-des">Name</label>
                        <input
                            type="text"
                            class="form-control custom-input"
                            id="name"
                            name="name"
                            placeholder="Enter product name..."
                            value="{{ $product->name }}"
                        >
                    </div>

                    <!-- Description -->
                    <div class="mb-3">
                        <label for="description" class="form-label card-txt-des">Description</label>
                        <textarea
                            class="form-control custom-input"
                            id="description"
                            name="description"
                            rows="4"
                            placeholder="Enter product description..."
                        >{{ $product->description }}</textarea>
                    </div>

                    <!-- Amount -->
                    <div class="mb-3">
                        <label for="amount" class="form-label card-txt-des">Amount</label>
                        <input
                            type="number"
                            class="form-control custom-input"
                            id="amount"
                            name="amount"
                            placeholder="Enter quantity..."
                            value="{{ $product->amount }}"
                        >
                    </div>

                    <!-- Price -->
                    <div class="mb-3">
                        <label for="price" class="form-label card-txt-des">Price</label>
                        <input
                            type="text"
                            class="form-control custom-input"
                            id="price"
                            name="price"
                            placeholder="Enter price..."
                            value="{{ $product->price }}"
                        >
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label card-txt-des">Image</label>
                        <img src="{{ asset('storage/images/' . $product->image) }}" style="width: 100px; height: 100px;">
                        <br><br>
                        <input type="file" class="form-control custom-input" id="image" name="image">
                    </div>

                    <!-- Dugme za dodavanje -->
                    <button type="submit" class="btn btn-cart mt-2">
                        Update product
                    </button>
                </form>
            </div>
        </div>
    </div>



@endsection
