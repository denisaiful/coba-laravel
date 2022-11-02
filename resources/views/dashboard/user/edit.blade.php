@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/user/{{ $user->slug }}" method="post" class="mb-2" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{  old('name', $user->name) }}" id="name" name="name"  autofocus>   
    @error('name')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="username" class="form-label">Username</label>
    <input type="text" class="form-control @error('username') is-invalid @enderror" value="{{ old('username',$user->username) }}" id="username" name="username" >   
     @error('username')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug',$user->slug) }}" id="slug" name="slug" >   
     @error('slug')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email',$user->email) }}" id="email" name="email" >   
     @error('email')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Category</label>
    <select class="form-select" name="is_admin">    
  <option value="{{ old('is_admin',$user->is_admin) }}" selected readonly>{{ old('is_admin',$user->is_admin) }}</option> 
  <option value="0">0</option>
  <option value="1">1</option>
 
</select> 
  </div>

 
<button type="submit" class="btn btn-primary mb-5" >Update user</button>
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