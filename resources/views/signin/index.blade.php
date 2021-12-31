@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-6">

            @if (session()->has('succesRegister'))
                <div class="alert alert-success alert-dismissible fade show mb-4 rounded-pill px-4" role="alert">
                    {{ session('succesRegister') }}
                    <button class="btn-close me-2" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session()->has('signinError'))
                <div class="alert alert-danger alert-dismissible fade show mb-4 rounded-pill px-4" role="alert">
                    {{ session('signinError') }}
                    <button class="btn-close me-2" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <main class="form-signin">
                <h1 class="h3 mb-3 fw-normal text-center mb-5">Please sign in</h1>
                <form action="/signin" method="POST">
                    @csrf
                    <div class="form-floating">
                        <input type="email" name="email"
                            class="form-control mb-3 rounded-pill @error('email') is-invalid @enderror"
                            placeholder="name@example.com" autofocus required value="{{ old('email') }}">
                        <label for="floatingInput">Email address</label>
                        @error('email')
                            <div class="invalid-feedback mb-3">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control mb-3 rounded-pill" placeholder="Password"
                            required>
                        <label for="floatingPassword">Password</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-primary rounded-pill" type="submit">
                        Sign in
                    </button>
                </form>
                <div class="small mt-5 text-center">
                    Not registered?
                    <a href="/register">Register now!</a>
                </div>
            </main>
        </div>
    </div>

@endsection
