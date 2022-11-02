@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit User</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/beasiswa/{{ $beasiswa->id }}" method="post" class="mb-2" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('NAMA') is-invalid @enderror" value="{{  old('NAMA', $beasiswa->NAMA) }}" id="NAMA" name="NAMA"  autofocus>   
    @error('NAMA')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Kampus</label>
    <select class="form-select " name="UNIV">
  @foreach ($campuses as $campus)
  <option value="{{ $campus->id }}" selected>{{ $campus->name }}</option>
  @endforeach 
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