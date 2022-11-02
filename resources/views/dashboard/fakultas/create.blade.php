@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Fakultas</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/fakultas" method="post" class="mb-2">
@csrf
<div class="form-floating mt-3">
    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="fakultas"  name="name" placeholder="name" value="{{ old('name') }}" required>
    <label for="name">Nama Fakultas</label>
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
  <option value="{{ $campus->id }} ">{{ $campus->name }}</option>
  
      
  @endforeach 
  </select> 
  </div>

   
 
 
  <button class="w-30 btn btn-lg btn-primary mt-3" type="submit">Input Fakultas</button>
</form> 
</div>


@endsection