@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create User</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/user" method="post" class="mb-2">
@csrf
<div class="form-floating mt-3">
    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"  name="name" placeholder="name" value="{{ old('name') }}" required>
    <label for="name">Name</label>
    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>

    <div class="form-floating mt-3">
    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{ old('username') }}" required>
    <label for="username">Username</label>
     @error('username')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>
  <div class="form-floating mt-3">    
    <input type="text" class="form-control @error('slug') is-invalid @enderror" placeholder="slug" id="slug" name="slug" required>
    <label for="slug" class="form-label">Slug</label>   
     @error('slug')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>
  <div class="form-floating mt-3">
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com"  value="{{ old('email') }}" required>
    <label for="email">Email</label>
     @error('email')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>
  <div class="form-floating mt-3">
    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" name="password" id="password" placeholder="password" required>
    <label for="password">Password</label>
     @error('password')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>
  <div class="mt-3">
    
    <select class="form-select" name="is_admin">    
        <option selected>--input Role--</option>
        <option value="0" >User</option>
        <option value="1" >Admin</option>
    </select> 
  </div>
 
  <button class="w-30 btn btn-lg btn-primary mt-3" type="submit">Input User</button>
</form> 
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