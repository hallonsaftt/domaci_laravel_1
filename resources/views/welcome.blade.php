@extends('layout')


@section('pageTitle')
    Welcome Page
@endsection

@section('sourcePage')

    <p>Current time is: {{ date('H:i:s') }}</p>
@endsection

