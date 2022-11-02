@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data KAMPUS</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/campus" method="post" class="mb-2" enctype="multipart/form-data">
@csrf
<div class="form-floating mt-3">
    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="NAMA"  name="name" placeholder="name" value="{{ old('name') }}" required>
    <label for="name">NAMA KAMPUS</label>
    @error('name')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Logo Image </label>
    <img class="img-preview img-fluid mb-3 col-sm-5">
  
    <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
    @error('image')         
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror  
    </div>
 
  <button class="w-30 btn btn-lg btn-primary mt-3" type="submit">Input Kampus</button>
</form> 
</div>

<script>
  const title = document.querySelector('#title');
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