

@extends('layouts.main')

@section('container')
<h2 class="mb-5">Post Category : {{ $category }}</h2>
    @foreach($posts as $post)

    <article>
    <a href="/posts/{{ $post->slug }}">{{ $post->title }}</></a>
  
     <p>{{ $post->excerpt }}</p>  
     </article> 
    @endforeach
    <a href="/posts">back to post</a>
@endsection
