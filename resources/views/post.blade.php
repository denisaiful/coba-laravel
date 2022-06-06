
@extends('layouts.main')

@section('container')

<div class="container">
   <div class="row justify-content-center mb-5">
      <div class="col-md-8">
       
        
            <h2>{{ $post["title"] }}</h2>
            <small class="text-muted">
            <p>By. <a href="/posts?author={{ $post->author->username }}" class="text-decoration-none" >{{ $post->author->name }}</a> in. <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
            </small>
               @if($post->image)
            <div style="max-height: 400px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            </div>
               @else
            <img src="https://source.unsplash.com/1200x300/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">

            @endif
            {!! $post->body !!}
         </article>
         
         <a href="/posts" class="text-decoration-none my-3">back to post</a>
      </div>
   </div>
</div>

   

    @endsection