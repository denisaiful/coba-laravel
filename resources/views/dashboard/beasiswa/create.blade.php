@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data</h1>
    </div>
<div class="col-lg-8">
<form  Action="/dashboard/beasiswa" method="post" class="mb-2">
@csrf
<div class="form-floating mt-3">
    <input type="text" class="form-control rounded-top @error('NAMA') is-invalid @enderror" id="NAMA"  name="NAMA" placeholder="NAMA" value="{{ old('NAMA') }}" required>
    <label for="NAMA">NAMA</label>
    @error('NAMA')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>

    <div class="form-floating mt-3">
    <input type="text" class="form-control @error('NIP') is-invalid @enderror" id="NIP" name="NIP" placeholder="NIP" value="{{ old('NIP') }}" required>
    <label for="NIP">NIP</label>
     @error('NIP')
    <div class="invalid-feedback">
    {{ $message }}
    </div>        
    @enderror
  </div>
  
    
  <div class="mt-3">
    
    <select class="form-select" name="STRATA">    
        <option selected>--Program Studi--</option>
        <option value="S1" >S1</option>
        <option value="S2" >S2</option>
        <option value="S3" >S3</option>
    </select> 
  </div>
 
  <button class="w-30 btn btn-lg btn-primary mt-3" type="submit">Input User</button>
</form> 
</div>


@endsection