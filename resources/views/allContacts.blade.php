@extends('layout')


@section('pageTitle')
    All Products
@endsection

@section('sourcePage')

    <div class="container my-4">
        <h2 class="text-center mb-3 blink">All Contacts</h2>


        <div class="table-responsive shop-cart p-3" style="border-radius: 10px;">
            <table class="table align-middle text-white">
                <thead>
                <tr style="border-bottom: 1px solid #371c6c;">
                    <th scope="col">First name</th>
                    <th scope="col">Last name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Message</th>
                    <th scope="col">Recrived At</th>
                    <th scope="col">Actions</th>

                </tr>
                </thead>
                <tbody>
                @foreach($allContacts as $contact)
                    <tr style="border-bottom: 1px solid #371c6c;">

                        <td class="card-txt-des">{{ $contact->first_name }}</td>

                        <td class="card-txt-des">{{ $contact->last_name }}</td>

                        <td class="shop-cart-des"><p>{{ $contact->email }}</p></td>

                        <td class="shop-cart-des">{{ $contact->subject }}</td>

                        <td class="shop-cart-des">{{ $contact->message }}</td>

                        <td class="shop-cart-des">{{ $contact->created_at }}</td>

                        <td class="shop-cart-des">
                            <a class="btn btn-danger" href="/admin/delete-contact/{{ $contact->id }}">Obrisi</a>
                            <a class="btn btn-primary">Edituj</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>



@endsection
