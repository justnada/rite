@extends('dashboard.layouts.main')

@section('container')
    <section class="section">
        <div class="section-header">
            <p class="mb-0"><a href="/dashboard/posts">Back </a>/ Detail</p>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="display-6 fst-bold mb-5 text-center">{{ $post->title }}</h2>
                    @if ($post->image)
                        <div class="mb-4" style="max-height: 300px; overflow: hidden;">
                            <img src="{{ asset('storage/' . $post->image) }}" class="img-fluid card-img-top rounded-3">
                        </div>
                    @else
                        <img src="https://source.unsplash.com/1200x400?{{ $post->category->name }}"
                            class="card-img-top rounded-3 mb-4" alt="{{ $post->category->name }}">
                    @endif
                    <div class="d-flex justify-content-between">
                        <p class="mb-3">
                            By <a href="/posts?author={{ $post->author->username }}"> {{ $post->author->name }}</a>
                            In <a href="/posts?category={{ $post->category->slug }}">
                                {{ $post->category->name }}</a>
                        </p>
                        <p class="mb-4"><small class="text-muted">Last updated
                                {{ $post->created_at->diffForHumans() }}</small></p>
                    </div>
                    <article class="my-5">
                        {!! $post->body !!}
                    </article>
                </div>
            </div>
        </div>
    </section>
@endsection
