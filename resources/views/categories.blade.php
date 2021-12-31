@extends('layouts.main')

@section('container')
    <h1 class="mb-5">Post Categories</h1>
    
    <ul class="ps-0">
    @foreach ($categories as $category)
            <li>
                <h2>
                    <a href="/posts?category={{ $category->slug }}">{{ $category->name }}</a>
                </h2>
            </li>
    @endforeach
        </ul>

@endsection