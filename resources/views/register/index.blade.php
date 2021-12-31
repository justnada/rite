@extends('layouts.main')

@section('container')

    <div class="row justify-content-center">
        <div class="col-lg-6">
             <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center mb-5">Registration Form</h1>
        <form action="/register" method="POST">
            @csrf
            <div class="form-floating mb-3 ">
                <input type="text" class="form-control rounded-pill @error('name') is-invalid @enderror" placeholder="name" name="name" value="{{ old('name') }}" required>
                <label>Fullname</label>
                @error('name')
                <div class="invalid-feedback mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control rounded-pill @error('username') is-invalid @enderror" placeholder="username" name="username" value="{{ old('username') }}" required>
                <label>Username</label>
                @error('username')
                <div class="invalid-feedback mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-floating mb-3">
                <input type="email" class="form-control rounded-pill @error('email') is-invalid @enderror" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                <label>Email address</label>
                 @error('email')
                <div class="invalid-feedback mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
                <div class="form-floating mb-3">
                <input type="password" class="form-control rounded-pill @error('password') is-invalid @enderror" placeholder="Password" name="password" required>
                <label>Password</label>
                 @error('password')
                <div class="invalid-feedback mt-2">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <button class="w-100 btn btn-lg btn-primary rounded-pill" type="submit">
                Sign in
            </button>
        </form>
        <div class="small mt-5 text-center">
            Already registered?
            <a href="/signin">Sign in now!</a>
        </div>
        </main>
        </div>
    </div>

@endsection