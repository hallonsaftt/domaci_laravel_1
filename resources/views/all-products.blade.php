@extends('layout')


@section('pageTitle')
    All Products
@endsection

@section('sourcePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">Products All</h2>


        <div class="table-responsive shop-cart p-3" style="border-radius: 10px;">
            <table class="table align-middle text-white">
                <thead>
                <tr style="border-bottom: 1px solid #371c6c;">
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price (&euro;)</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($allProducts as $product)
                    <tr style="border-bottom: 1px solid #371c6c;">
                        <!-- Slika proizvoda -->
                        <td>
                            <img
                                src="{{ asset('storage/images/' . $product->image) }}"
                                alt="Product Image"
                                style="width: 100px; height: auto; object-fit: cover;"
                            >
                        </td>
                        <!-- Naziv proizvoda -->
                        <td class="card-txt-des">{{ $product->name }}</td>
                        <!-- Opis proizvoda -->
                        <td class="card-txt-des">{{ $product->description }}</td>
                        <!-- Cena -->
                        <td class="shop-cart-txt">{{ $product->price }}</td>
                        <!-- Količina (amount) -->
                        <td class="shop-cart-txt">{{ $product->amount }}</td>

                        <td class="shop-cart-txt">
                            <a class="btn btn-danger" href="{{ route('deleteProduct', ['product' => $product->id]) }}">Obrisi</a>
                            <a class="btn btn-primary edit-btn"
                               data-id="{{ $product->id }}"
                               data-name="{{ $product->name }}"
                               data-description="{{ $product->description }}"
                               data-price="{{ $product->price }}"
                               data-amount="{{ $product->amount }}">
                                Edituj
                            </a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal za editovanje proizvoda -->
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content custom-bg">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edituj Proizvod</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Zatvori">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="editProductForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="productName">Naziv</label>
                            <input type="text" class="form-control custom-input" id="productName" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="productDescription">Opis</label>
                            <textarea class="form-control custom-input" id="productDescription" name="description" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="productPrice">Cena (&euro;)</label>
                            <input type="text" class="form-control custom-input" id="productPrice" name="price" required>
                        </div>
                        <div class="form-group">
                            <label for="productAmount">Količina</label>
                            <input type="number" class="form-control custom-input" id="productAmount" name="amount" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zatvori</button>
                        <button type="submit" class="btn btn-purple">Sačuvaj promene</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('.edit-btn').on('click', function() {
                // Uzimanje podataka iz data atributa dugmeta
                let productId = $(this).data('id');
                let name = $(this).data('name');
                let description = $(this).data('description');
                let price = $(this).data('price');
                let amount = $(this).data('amount');

                // Popunjavanje forme u modalu
                $('#productName').val(name);
                $('#productDescription').val(description);
                $('#productPrice').val(price);
                $('#productAmount').val(amount);

                // Postavljanje action atributa forme za update
                $('#editProductForm').attr('action', '/updateProduct/' + productId);

                // Otvaranje modala
                $('#editModal').modal('show');
            });
        });
    </script>





@endsection
