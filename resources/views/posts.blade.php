@extends('layouts.main')

@section('container')

    {{-- search --}}
    <form class="d-flex align-items-center mb-5" action="/posts">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @elseif (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <input class="form-control rounded-pill" type="text" placeholder="Search" aria-label="Search" name="search"
            value="{{ request('search') }}">
        <button class="btn" type="submit">
            <box-icon name="search" size="35px" color="grey" class="pt-2"></box-icon>
        </button>
    </form>

    {{-- jumbotron section --}}
    @if ($posts->count())

        <div class="p-4 p-md-5 text-white rounded-3 bg-dark d-flex align-items-center mb-3">
            <div class="col-md-6 px-2">
                <h1 class="display-5 fst-bold">
                    <a href="/posts/{{ $posts[0]->slug }}" class="text-white">
                        {{ $posts[0]->title }}
                    </a>
                </h1>
                <p class="mb-3">
                    By <a href="/posts?author={{ $posts[0]->author->username }}"> {{ $posts[0]->author->name }}</a>
                    | <a href="/posts?category={{ $posts[0]->category->slug }}">
                        {{ $posts[0]->category->name }}</a>
                </p>
                <p class="fw-light fs-5 my-4">
                    {{ $posts[0]->excerpt }}
                </p>
                <p class="mb-4"><small class="text-muted">Last updated
                        {{ $posts[0]->updated_at->diffForHumans() }}</small></p>
                <a href="/posts/{{ $posts[0]->slug }}" class="btn btn-outline-light rounded-pill">Start reading...</a>
            </div>
            <div class="col-md-6 px-2">
                @if ($posts[0]->image)
                    <div class="mb-4" style="max-height: 300px; overflow: hidden;">
                        <img src="{{ asset('storage/' . $posts[0]->image) }}" class="img-fluid card-img-top rounded-3">
                    </div>
                @else
                    <img src="https://source.unsplash.com/1200x400?{{ $posts[0]->category->name }}"
                        class="card-img-top rounded-3 mb-4" alt="{{ $posts[0]->category->name }}">
                @endif
            </div>
        </div>

    @endif

    {{-- main section --}}
    <div class="container">
        <div class="row">

            <h2 class="text-center fw-bold my-5 text-uppercase">{{ $title }}</h2>

            {{-- categories --}}
            <div class="d-flex justify-content-center mb-5">
                <a href="/posts" class="btn btn-outline-dark rounded-pill mx-3">All</a>
                @foreach ($categories as $category)
                    <a href="/posts?category={{ $category->slug }}" class="btn btn-outline-dark rounded-pill mx-3">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>

            {{-- all posts --}}
            @if ($posts->count())

                @foreach ($posts->skip(1) as $post)
                    <div class="col-md-4 mb-5 mt-3">
                        <div class="card border-0 px-2 py-3">
                            <div class="position-absolute bg-primary px-3 py-2 text-white rounded-start rounded-pill ">
                                <a href="/posts?category={{ $post->category->slug }}"
                                    class="text-decoration-none text-white">
                                    {{ $post->category->name }}
                            </div>
                            </a>
                            @if ($post->image)
                                <div class="mb-4" style="max-height: 300px; overflow: hidden;">
                                    <img src="{{ asset('storage/' . $post->image) }}"
                                        class="img-fluid card-img-top rounded-3">
                                </div>
                            @else
                                <img src="https://source.unsplash.com/1200x600?{{ $post->category->name }}"
                                    class="card-img-top rounded-3 mb-4" alt="{{ $post->category->name }}">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">
                                    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</a>
                                </h5>
                                <p class="mb-3">
                                    By <a href="/posts?author={{ $post->author->username }}">
                                        {{ $post->author->name }}</a>
                                </p>
                                <p class="card-text">{{ $post->excerpt }}</p>
                                <a href="/posts/{{ $post->slug }}" class="btn btn-outline-primary rounded-pill my-3">Read
                                    More..</a>
                                <p class="card-text"><small class="text-muted mt-3 border-top d-block pt-3">Last
                                        updated {{ $posts[0]->updated_at->diffForHumans() }}</small></p>
                            </div>
                        </div>
                    </div>
                @endforeach

            @else
                <p class="text-center lead my-5 fst-italic">Sorry, no post found.</p>
            @endif

            {{ $posts->links('vendor.pagination.bootstrap-4') }}

        </div>
    </div>
@endsection
