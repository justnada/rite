@extends('dashboard.layouts.main')

@section('container')

    <section class="section">
        <div class="section-header">
            <p class="mb-0"><a href="/dashboard/posts">Back </a>/ Create</p>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="/dashboard/posts" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            name="title" id="title" value="{{ old('title') }}" autofocus>
                                        @error('title')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Slug</label>
                                    <div class="col-sm-12 col-md-7">
                                        <input type="text" class="form-control @error('slug') is-invalid @enderror"
                                            name="slug" id="slug" readonly value="{{ old('slug') }}" required>
                                        @error('slug')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                    <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="category_id">
                                            <option selected disabled>Select Category</option>
                                            @foreach ($categories as $category)
                                                @if (old('category_id') == $category->id)
                                                    <option value="{{ $category->id }}" selected>{{ $category->name }}
                                                    </option>
                                                @else
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Image</label>
                                    <div class="col-sm-12 col-md-7">
                                        <div class="custom-file">
                                            <input type="file"
                                                class="custom-file-input mt-0 @error('image') is-invalid @enderror"
                                                name="image" accept="image/*" onchange="previewImage()">
                                            <label class="custom-file-label">Choose file</label>
                                        </div>
                                        <img class="img-preview img-fluid my-3 col-sm-6 pt-3 m-auto">
                                        @error('image')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                    <div class="col-sm-12 col-md-7">
                                        <textarea class="summernote-simple" name="body">{{ old('body') }}</textarea>
                                        @error('body')
                                            <p class="text-danger">
                                                {{ $message }}
                                            </p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-4">
                                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                    <div class="col-sm-12 col-md-7 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Create Post</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
