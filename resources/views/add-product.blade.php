@extends('layout')


@section('pageTitle')
    Add product
@endsection

@section('sourcePage')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 shop-cart p-4">
                <h2 class="mb-4 text-center">Add a New Product</h2>

                <!-- Prikaz grešaka validacije (ako postoje) -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Forma za dodavanje proizvoda -->
                <!-- VAŽNO: "multipart/form-data" ako želiš upload slike -->
                <form action="/admin/add-product" method="POST" enctype="multipart/form-data">
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
                            value="{{ old('name') }}"
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
                        >{{ old('description') }}</textarea>
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
                            value="{{ old('amount') }}"
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
                            value="{{ old('price') }}"
                        >
                    </div>

                    <!-- Image -->
                    <div class="mb-3">
                        <label for="image" class="form-label card-txt-des">Image</label>
                        <input
                            type="file"
                            class="form-control custom-input"
                            id="image"
                            name="image"
                        >
                    </div>

                    <!-- Dugme za dodavanje -->
                    <button type="submit" class="btn btn-cart mt-2">
                        Add Product
                    </button>
                </form>
            </div>
        </div>
    </div>


@endsection
