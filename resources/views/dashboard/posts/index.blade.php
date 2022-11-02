@extends('dashboard.layouts.main')

@section('container')
 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">{{ auth()->user()->name }}</h1>
    </div>
    
 
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-10" role="alert">
  {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      
    @endif
<div class="table-responsive col-lg-10">

<a href="/dashboard/posts/create" class="btn btn-success mb-3">Create New Post</a>
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Title</th>
              <th scope="col">Category</th>
              <th scope="col">Image</th>
              <th scope="col">Action</th>
             
            </tr>
          </thead>
          <tbody>
          @foreach($posts as $post)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $post->title }}</td>
              <td>{{ $post->Category->name }}</td>
              <td>
           
            @if($post->image)
            <div style="max-width: 100px; overflow:hidden">
            <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">
            </div>
               @else
            <img src="https://source.unsplash.com/100x30/?{{ $post->category->name }}" class="card-img-top" alt="{{ $post->category->name }}" class="img-fluid mt-3">

            @endif
            </div></td>
              <td>
              <a href="/dashboard/posts/{{ $post->slug }}" class="badge bg-info"> <span data-feather="eye"></span></a>
              <a href="/dashboard/posts/{{ $post->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>

              <form Action="/dashboard/posts/{{ $post->slug }}" method="post" class="d-inline">
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