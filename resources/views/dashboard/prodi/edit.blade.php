@extends('dashboard.layouts.main')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Edit Prodi</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/prodi/{{ $prodi->id }}" method="post" class="mb-2" enctype="multipart/form-data">
  @method('put')
  @csrf
  <div class="mb-3">
    <label for="title" class="form-label">Name</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" value="{{  old('name', $prodi->name) }}" id="name" name="name"  autofocus>   
    @error('name')        
    <div class="invalid-feedback">
    {{ $message }}
    </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="category" class="form-label">Universitas</label>
    <select class="form-select " name="id_kampus">
  @foreach ($campuses as $campus)
  @if(old('id_kampus',$prodi->id_kampus) == $campus->id)
    
  <option value="{{ $campus->id }}" selected>{{ $campus->name }}</option>
  @else
        
  <option value="{{ $campus->id }} ">{{ $campus->name }}</option>
    @endif

  
  {{-- <option value="{{ $campus->id }} ">{{ $campus->name }}</option> --}}
  
      
  @endforeach 
  </select> 
  </div>

  <div class="mb-3">
    <label for="category" class="form-label">Fakultas</label>
    <select class="form-control " name="id_fakultas" id="kota">
  @foreach ($fakulties as $fakultas)
  @if(old('id_fakultas',$prodi->id_fakultas) == $fakultas->id)
    
  <option value="{{ $fakultas->id }}" selected>{{ $fakultas->name }}</option>
  @else
        
  <option value="{{ $fakultas->id }} ">{{ $fakultas->name }} - {{ $fakultas->campus->name }}</option>
    @endif

  
  {{-- <option value="{{ $campus->id }} ">{{ $campus->name }}</option> --}}
  
      
  @endforeach 
  </select> 
  </div>
 

 
<button type="submit" class="btn btn-primary mb-5" >Update Prodi</button>
</form> 
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
const title = document.querySelector('#username');
const slug = document.querySelector('#slug');

title.addEventListener('change', function(){
    fetch('/dashboard/posts/checkSlug?title=' + title.value)
    .then(response => response.json())
    .then(data => slug.value = data.slug)
});

</script>
<script>
  var f=jQuery.noConflict();
          f(document).ready(function () {
              f("#kota").select2({
                  theme: 'bootstrap4',
                  placeholder: "Pilih Kegiatan"
              });
  
      f("#kota1").select2({
                  theme: 'bootstrap4',
                  placeholder: "Pilih Pelatihan"
              });
              f("#kota2").select2({
                  theme: 'bootstrap4',
                  placeholder: "Please Select"
              });
          });
      </script>
@endsection