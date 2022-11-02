@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Welcome {{ auth()->user()->name }}</h1>
    </div>
    
 
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
  {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      
    @endif
<div class="table-responsive col-lg-10">


        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Kampus</th>
              <th scope="col">Program</th>
              <th scope="col">FAKULTAS</th>
              <th scope="col">STATUS</th>
              <th scope="col">Action</th>
             
            </tr>
          </thead>
          <tbody>
          @foreach($beasiswas as $beasiswa)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $beasiswa->NAMA }}</td>
              <td>{{ $beasiswa->campus->name }}</td>
              <td>{{ $beasiswa->STRATA }}</td>
              <td>{{ $beasiswa->faculty->fakultas }}</td>
              <td>{{ $beasiswa->STATUS }}</td>
            
              <td>
              <a href="/dashboard/programs/{{ $beasiswa->id }}" class="badge bg-info"> <span data-feather="eye"></span></a>
              <a href="/dashboard/programs/{{ $beasiswa->id }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>

              <form Action="/dashboard/programs/{{ $beasiswa->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf

              <button class="badge bg-danger border-0" onclick="return confirm('Are yo sure?')"><span data-feather="x-circle"> </button>
              </form>
              {{-- <a href="" class="badge bg-danger"> <span data-feather="x-circle"></span></a> --}}
              
              </td>
            
            </tr>
              
          @endforeach
           
          </tbody>
        </table>
      </div>

  

@endsection