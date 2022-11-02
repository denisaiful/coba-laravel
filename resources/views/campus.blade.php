
@extends('layouts.main')

@section('container')

<div class="container">
   <div class="row">
    @foreach($campuses as $campus)
      <div class="col-md-4 mt-3">
   <a href="/campus?campus={{ $campus->id }}"> 
      <div class="card bg-dark text-white">
         <img src="{{ asset('storage/' . $campus->image) }}" class="card-img-top" alt="{{ $campus->image }}">
         <div class="card-img-overlay d-flex align-items-center p-0">
            <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0,0,0,0.7)">{{ $campus->name }}</h5>
           
         </div>
         </div>
         </a>
      </div>
      @endforeach
   </div>
</div>
   
 
    @endsection