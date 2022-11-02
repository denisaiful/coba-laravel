@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Fakultas</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/fakultas/{{ $faculty->id }}" method="post" class="mb-2" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{  old('name', $faculty->name) }}" id="name" name="name"  autofocus>   
    @error('name')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Universitas</label>
    <select class="form-select " name="id_univ">
  @foreach ($campuses as $campus)
  @if(old('id_univ',$faculty->id_univ) == $campus->id)
    
  <option value="{{ $campus->id }}" selected>{{ $campus->name }}</option>
  @else
        
  <option value="{{ $campus->id }} ">{{ $campus->name }}</option>
    @endif

  
  {{-- <option value="{{ $campus->id }} ">{{ $campus->name }}</option> --}}
  
      
  @endforeach 
  </select> 
  </div>
 

 
<button type="submit" class="btn btn-primary mb-5" >Update Fakultas</button>
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