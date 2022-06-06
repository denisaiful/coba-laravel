@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Create Categories</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/categories" method="post" class="mb-2" enctype="multipart/form-data">
@csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" name="name"  autofocus>   
    @error('name')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="slug" class="form-label">Slug</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}" id="slug" name="slug" >   
     @error('slug')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>

 
<button type="submit" class="btn btn-primary mb-5" >Create Category</button>
</form> 
</div>

<script>
const title = document.querySelector('#name');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});


</script>
@endsection