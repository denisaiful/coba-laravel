@extends('layouts.main')

@section('container')
    <h1>Halaman About deni</h1>
    <h3>{{ $name }}</h3>
    <h3>{{ $email }}</h3>

    <img src="{{ $image }}" alt="{{ $name }}" width="200" class="img-thumnail rounded-circle">

    @endsection
