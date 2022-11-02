
@extends('dashboard.layouts.main')

@section('container')

<div class="container">
   <div class="row my-3">
      <div class="col-lg-8">   

        
            <h2 class="mb-3">{{ $beasiswa["NAMA"] }} <br> <small>Program {{ $beasiswa["STRATA"] }}</small></h2>
           
           <a href="/dashboard/programs" class="btn btn-success mb-2"><span data-feather="arrow-left"></span> Back </a>
           <a href="/dashboard/programs/{{ $beasiswa->id }}/edit" class="btn btn-warning mb-2"><span data-feather="edit"></span> Upload File</a>
          

         <form Action="/dashboard/programs/{{ $beasiswa->id }}" method="post" class="d-inline">
              @method('delete')
              @csrf

              <button class="btn btn-danger mb-2" onclick="return confirm('Are yo sure?')"><span data-feather="x-circle"></span> delete  </button>
              </form>

         <article class="my-3">
            <table class="table table-hover">
               <thead>
                 <tr>
                   <th scope="col">#</th>
                   <th scope="col">Laporan</th>
                   <th scope="col">tanggal</th>
                   <th scope="col">file</th>
                  
                 </tr>
               </thead>
               <tbody>
                 <tr>
                   <th scope="row">1</th>
                   <td>Jurnal 1</td>
                   <td> @if($beasiswa->jurnal1)
                    {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
                    <p><a href="{{ asset('storage/'.$beasiswa->jurnal1) }}" >file sudah di uplad</a></p>
                    @else
                
                    blom upload
                    @endif</td>
                   <td>upload</td>
                 </tr>
                 <tr>
                   <th scope="row">2</th>
                   <td>Jurnal 2</td>
                   <td> @if($beasiswa->jurnal1)
                    {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
                    <p><a href="{{ asset('storage/'.$beasiswa->jurnal2) }}" >file sudah di uplad</a></p>
                    @else
                
                    blom upload
                    @endif</td>
                   <td>upload</td>
                 </tr>
                 <tr>
                  <th scope="row">2</th>
                  <td>Tesis</td>
                  <td> @if($beasiswa->jurnal1)
                   {{-- <img src="{{ asset('storage/'.$beasiswa->jurnal1) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block"> --}}
                   <p><a href="{{ asset('storage/'.$beasiswa->tesis) }}" >file sudah di uplad</a></p>
                   @else
               
                   blom upload
                   @endif</td>
                  <td>upload</td>
                </tr>
                
               </tbody>
             </table>

            
         </article>
         
      </div>
   </div>
</div>

   

    @endsection