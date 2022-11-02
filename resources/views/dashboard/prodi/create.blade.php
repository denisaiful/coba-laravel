@extends('dashboard.layouts.main')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Program Studi</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/prodi" method="post" class="mb-2">
@csrf
<div class="form-floating mt-3">
    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name"  name="name" placeholder="name" value="{{ old('name') }}" required>
    <label for="name">NAMA PROGRAM STUDI</label>
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
  <option value="{{ $campus->id }} ">{{ $campus->name }}</option>
  
      
  @endforeach 
  </select> 
  </div>

  
  <div class="mb-3">
    <label for="category" class="form-label">Fakultas</label>
    <select class="form-select " name="id_fakultas" id="kota">
  @foreach ($fakulties as $fakultas)
  <option value="{{ $fakultas->id }} ">{{ $fakultas->name }} - {{ $fakultas->campus->name }}</option>
  
      
  @endforeach 
  </select> 
  </div>

   
 
 
  <button class="w-30 btn btn-lg btn-primary mt-3" type="submit">Input Program Studi</button>
</form> 
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
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