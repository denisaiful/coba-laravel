@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Beasiswa</h1>
    </div>
<div class="col-lg-8">
<form  action="/dashboard/programs/{{ $beasiswa->id }}" method="post" class="mb-2" enctype="multipart/form-data">
@method('PUT')
@csrf
  
 

  <div class="mb-3">
  <label for="image" class="form-label">upload jurnal 1 </label>
  <input type="hidden" name="oldjurnal1" value="{{ $beasiswa->jurnal1 }}" >
    @if($beasiswa->jurnal1)
    {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
    <p><a href="{{ asset('storage/'.$beasiswa->jurnal1) }}" >file sudah di uplad</a></p>
    @else

    blom upload
    @endif

  

  <input class="form-control @error('jurnal1') is-invalid @enderror" type="file" id="jurnal1" name="jurnal1" onchange="previewImage()">
  @error('jurnal1')         
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror  
  </div>

  <div class="mb-3">
  
    <label for="image" class="form-label">upload Jurnal 2 </label>
    <input type="hidden" name="oldjurnal2" value="{{ $beasiswa->jurnal2 }}" >
      @if($beasiswa->jurnal2)
      {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
      <p><a href="{{ asset('storage/'.$beasiswa->jurnal1) }}" >file sudah di uplad</a></p>
      @else
  
     blom upload
      @endif
  
    
  
    <input class="form-control @error('jurnal2') is-invalid @enderror" type="file" id="jurnal2" name="jurnal2" onchange="previewImage()">
    @error('jurnal2')         
      <div class="invalid-feedback">
      {{ $message }}
      </div>
      @enderror  
    </div>

    <div class="mb-3">
      <label for="image" class="form-label">upload Tesis </label>
      <input type="hidden" name="oldtesis" value="{{ $beasiswa->tesis }}" >
        @if($beasiswa->tesis)
        {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
        <p><a href="{{ asset('storage/'.$beasiswa->tesis) }}" >file sudah di uplad</a></p>
        @else
    
        blom upload
        @endif
    
      
    
      <input class="form-control @error('tesis') is-invalid @enderror" type="file" id="tesis" name="tesis" onchange="previewImage()">
      @error('tesis')         
        <div class="invalid-feedback">
        {{ $message }}
        </div>
        @enderror  
      </div>
 
  </div>
 
<button type="submit" class="btn btn-primary mb-5" >Update Post</button>
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