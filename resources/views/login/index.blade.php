@extends('layouts.main')

@section('container')

<div class="row justify-content-center">
  <div class="col-md-4">

  @if(Session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
     {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

 @if(Session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
     {{ session('loginError') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<main class="form-signin">
<h1 class="h3 mb-3 fw-normal"><i class="bi bi-key-fill"></i> Please Login</h1>
  <form action="/login" method="post">
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    @csrf

    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="name@example.com" value="{{ old('email') }}" autofocus required >
      <label for="email" >Email address</label>
      @error('email')
      <div class="invalid-feedback">
      {{ $message }}

      </div>
        
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
      <label for="password" required>Password</label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>

  </form>
  <small class="d-block text-center mt-3">Not Registeres? <a href="/register">Register now!</a>
  </small>
</main>

  </div>
</div>


@endsection