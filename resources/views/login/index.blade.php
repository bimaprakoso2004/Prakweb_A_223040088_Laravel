@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
    <div class="col-md-4">

        @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <main class="form-signin">
            <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

            <form action="/login" method="POST">
                @csrf
                
                <div class="form-floating mb-3">
                    <input type="email" name="email" class="form-control" id="email" placeholder="name@example.com" required>
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                    <label for="password">Password</label>
                </div>

                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>

            <small class="d-block text-center mt-3">
                Don't have an account? <a href="/register">Register now</a>
            </small>
        </main>

    </div>
</div>

@endsection