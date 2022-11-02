@extends('layouts.main')

@section('container')

<div class="row justify-content-center">

  <div class="col-lg-5">


 <div class="shadow p-3 mb-5 bg-body rounded"> 
<main class="form-registration">
<h1 class="h3 mb-3 fw-normal">Registration Form</h1>
  <form action="/register" method="post">
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    @csrf

    <div class="form-floating">
      <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"  name="name" placeholder="name" value="{{ old('name') }}" required>
      <label for="name">Name</label>
      @error('name')
      <div class="invalid-feedback">
      {{ $message }}
      </div>        
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
      <label for="username">Username</label>
       @error('username')
      <div class="invalid-feedback">
      {{ $message }}
      </div>        
      @enderror
    </div>
    <div class="form-floating">
      <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug" placeholder="slug" value="{{ old('slug') }}" >
      <label for="slug">Slug</label>
       @error('slug')
      <div class="invalid-feedback">
      {{ $message }}
      </div>        
      @enderror
    </div>
    <div class="form-floating">
      <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com"  value="{{ old('email') }}" required>
      <label for="email">Email</label>
       @error('email')
      <div class="invalid-feedback">
      {{ $message }}
      </div>        
      @enderror
    </div>
    <div class="form-floating">
      <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="password" autocomplete="off" required>
      <label for="password">Password</label>
       @error('password')
      <div class="invalid-feedback">
      {{ $message }}
      </div>        
      @enderror
    </div>
    <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>

  </form>
  <small class="d-block text-center mt-3">already Registered? <a href="/login">Login</a>
  </small>
</main>
</div>
  </div>
</div>

<script>
  const title = document.querySelector('#username');
  const slug = document.querySelector('#slug');
  
  title.addEventListener('change', function(){
      fetch('/dashboard/posts/checkSlug?title=' + title.value)
      .then(response => response.json())
      .then(data => slug.value = data.slug)
  });
  </script>
@endsection