
@extends('layout')

@section('pageTitle')
    Contact page
@endsection

@section('sourcePage')


    <div class="container contact-cont mt-5">
        <h2 class="text-center text-light mb-4">Kontaktirajte nas</h2>
        @if(session('success'))
            <div style="color: green; font-weight: bold;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="color: red; font-weight: bold;">
                {{ session('error') }}
            </div>
        @endif

        {{-- Za validacione greške --}}
        @if($errors->any())
            <div style="color: orange; font-weight: bold;">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('contact.send') }}" method="POST" class="p-4 rounded custom-bg">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="first_name" class="form-label text-light">Ime</label>
                    <input type="text" class="form-control custom-input" id="first_name" name="first_name" placeholder="Vaše ime" required>
                </div>
                <div class="col-md-6">
                    <label for="last_name" class="form-label text-light">Prezime</label>
                    <input type="text" class="form-control custom-input" id="last_name" name="last_name" placeholder="Vaše prezime" required>
                </div>
            </div>

            <div class="mt-3">
                <label for="email" class="form-label text-light">Email adresa</label>
                <input type="email" class="form-control custom-input" id="email" name="email" placeholder="Vaš email" required>
            </div>

            <div class="mt-3">
                <label for="subject" class="form-label text-light">Naslov</label>
                <input type="text" class="form-control custom-input" id="subject" name="subject" placeholder="Naslov" required>
            </div>

            <div class="mt-3">
                <label for="message" class="form-label text-light">Poruka</label>
                <textarea class="form-control custom-input" id="message" name="message" rows="4" placeholder="Vaša poruka" required></textarea>
            </div>

            <button type="submit" class="btn btn-purple mt-4 w-100">Pošalji poruku</button>
        </form>
    </div>



    @endsection
</body>
</html>
