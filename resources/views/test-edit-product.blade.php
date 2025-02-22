

@extends('layout')


@section('pageTitle')
    Edit product
@endsection

@section('sourcePage')

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 shop-cart p-4">
                <h2 class="mb-4 text-center">Edit Propduct</h2>


                @if(session('success'))
                    <div id="succ-message" class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <script>
                    setTimeout(function() {
                        const elem = document.getElementById('succ-message');
                        if (elem) {

                            elem.style.transition = 'opacity 600ms';
                            elem.style.opacity = '0';


                            setTimeout(function() {
                                elem.style.display = 'none';
                            }, 600);
                        }
                    }, 1000);
                </script>


                <!-- Prikaz grešaka validacije (ako postoje) -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li style="text-decoration: none;">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif


                <!-- Forma za update proizvoda -->
                <form action="{{ route('update-product', ['id' => $product->id]) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Naziv -->
                    <div class="mb-3">
                        <label for="productName" class="form-label">Naziv</label>
                        <input type="text" name="name" id="productName" class="form-control"
                               value="{{ $product->name }}" required>
                    </div>

                    <!-- Opis -->
                    <div class="mb-3">
                        <label for="productDescription" class="form-label">Opis</label>
                        <textarea name="description" id="productDescription" class="form-control" required>{{ $product->description }}</textarea>
                    </div>

                    <!-- Cena -->
                    <div class="mb-3">
                        <label for="productPrice" class="form-label">Cena (&euro;)</label>
                        <input type="text" name="price" id="productPrice" class="form-control"
                               value="{{ $product->price }}" required>
                    </div>

                    <!-- Količina -->
                    <div class="mb-3">
                        <label for="productAmount" class="form-label">Količina</label>
                        <input type="number" name="amount" id="productAmount" class="form-control"
                               value="{{ $product->amount }}" required>
                    </div>

                    <!-- Slika (opciono) -->
                    <div class="mb-3">
                        <label for="productImage" class="form-label">Slika (opciono)</label>
                        <input type="file" name="image" id="productImage" class="form-control">
                        @if($product->image)
                            <p>Trenutna slika: <img src="{{ asset('storage/images/' . $product->image) }}" alt="..." width="100"></p>
                        @endif
                    </div>

                    <!-- Dugme za slanje forme -->
                    <button type="submit" class="btn btn-primary">Sačuvaj izmene</button>
                </form>
            </div>

            </div>
        </div>
    </div>


@endsection




