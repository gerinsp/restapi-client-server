@extends('app')

@section('container')

@if(session()->has('success'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-success col-lg-8 mt-5"  role="alert">
            {{ session('success') }}
        </div>
    </div>
@endif

@if(session()->has('failed'))
    <div class="d-flex justify-content-center">
        <div class="alert alert-danger col-lg-8 mt-5"  role="alert">
            {{ session('failed') }}
        </div>
    </div>
@endif
<div class="row justify-content-center mt-5">
    <div class="col-lg-5">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Form Registration</h1>
            <form action="/register" method="post">
              @csrf
              <div class="form-floating">
                <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" name="name" id="name" placeholder="Name" required value="{{ old('name') }}">
                <label for="name">Name</label>
                @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
               @enderror
              </div>
              <div class="form-floating">
                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" required value="{{ old('email') }}">
                <label for="email">Email address</label>
                @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
               @enderror
              </div>
              <div class="form-floating">
                <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
                @error('password')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
               @enderror
              </div>
              <button class="w-100 btn btn-lg text-white mt-3" style="background-color: rgb(45 62 80)" type="submit">Register</button>
            </form>
            <small class="d-block text-center mt-3">Already Registered? <a href="/login">Login</a></small>
          </main>
    </div>
</div>

@endsection