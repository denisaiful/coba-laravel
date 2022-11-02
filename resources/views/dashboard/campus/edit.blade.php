@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Kampus</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/campus/{{ $campus->id }}" method="post" class="mb-2" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{  old('name', $campus->name) }}" id="name" name="name"  autofocus>   
    @error('name')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="image" class="form-label">Post Image </label>
    <input type="hidden" name="oldImage" value="{{ $campus->image }}" >
      @if($campus->image)
      <img src="{{ asset('storage/'.$campus->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
  
      @else
  
      <img class="img-preview img-fluid mb-3 col-sm-5">    
      @endif
  
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')         
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror  
    </div>
  

 
<button type="submit" class="btn btn-primary mb-5" >Update Kampus</button>
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

function previewImage() {
  const image = document.querySelector('#image');
  const imgPreview = document.querySelector('.img-preview');

  imgPreview.style.display = 'block';
  const oFReader = new FileReader();
  oFReader.readAsDataURL(image.files[0]);

  oFReader.onload = function(oFREvent) {
    imgPreview.src = oFREvent.target.result;
  }
}

</script>
@endsection