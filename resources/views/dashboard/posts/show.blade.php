
@extends('dashboard.layouts.main')

@section('container')

<div class="container">
   <div class="row my-3">
      <div class="col-lg-8">   

.h3   
        
            <h2 class="mb-3">{{ $post["title"] }}</h2>
           
           <a href="/dashboard/posts" class="btn btn-success mb-2"><span data-feather="arrow-left"></span> Back to all my posts</a>
           <a href="/dashboard/posts/{{ $post->slug }}/edit" class="btn btn-warning mb-2"><span data-feather="edit"></span> edit</a>
          

         <form Action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
              @method('delete')
              @csrf

              <button class="btn btn-danger mb-2" onclick="return confirm('Are yo sure?')"><span data-feather="x-circle"></span> delete  </button>
              </form>

            @if($post->image)
            <div style="max-height: 400px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            </div>
               @else
            <img src="https://source.unsplash.com/1200x300/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">

            @endif
         <article class="my-3">
            {!! $post->body !!}
         </article>
         
      </div>
   </div>
</div>

   

    @endsection