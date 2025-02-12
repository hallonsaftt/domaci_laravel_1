@extends('layout')


@section('pageTitle')
    Welcome Page
@endsection

@section('sourcePage')

    <p>Current time is: {{ $trenutnovreme }}</p>

    @if($sat >= 0 && $sat <= 12)
        Dobro jutro
    @else
        Dobar dan
    @endif

    <p>Trenutno sati {{ $sat }}</p>
@endsection

