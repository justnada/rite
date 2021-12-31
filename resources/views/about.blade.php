@extends('layouts.main')

@section('container')
    <h3>{{ $name }}</h3>
    <p>{{ $email }}</p>
    <img src="img/{{ $image }}" alt="{{ $name }}" width="300" class="rounded-circle">
@endsection
