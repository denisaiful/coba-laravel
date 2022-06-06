
@extends('layouts.main')

@section('container')
<h2 class="mb-5">Post Categories </h2>
    @foreach($categories as $category)

 <ul>
 <li>
 <a href="/categories/{{ $category->slug }}"><h5>{{ $category->name }}</></a></h5>
 </li>
 </ul>

    @endforeach
@endsection
