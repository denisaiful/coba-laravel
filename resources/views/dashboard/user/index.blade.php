<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.semanticui.min.css"/>
@extends('dashboard.layouts.main')

@section('container')

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">User</h1>
    </div>
    
 
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
  {{ session('success') }}
   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
      
    @endif
   
<a href="/dashboard/user/create" class="shadow p-2 rounded btn btn-success mb-3">Create New User</a>

<div class="shadow p-3 mb-5 bg-white rounded">
<div class="col px-lg-4" >
        <table id="example" class="ui celled table" >
          <thead>
            <tr>
              <th scope="col">No.</th>
              <th scope="col">Name</th>
              <th scope="col">Username</th>
              <th scope="col">email</th>
              <th scope="col">role</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          @foreach($users as $user)
            <tr>
              <td>{{ $loop->iteration }}.</td>
              <td>{{ $user->name }}</td>
              <td>{{ $user->username }}</td>
              <td>{{ $user->email }}</td>
              <td>{{ $user->is_admin }}</td>
              <td>
              <a href="/dashboard/user/{{ $user->slug }}/edit" class="badge bg-warning"> <span data-feather="edit"></span></a>
              
              <form Action="/dashboard/user/{{ $user->slug }}" method="post" class="d-inline">
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
    </div>
    

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.semanticui.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.3.1/semantic.min.js"></script>
      
<script type="text/javascript">
  var f=jQuery.noConflict(); 
      f(document).ready(function() {
      f('#example').DataTable();
  } );
  </script>
      
      <script type="text/javascript">
            $(document).ready(function() {
                window.setTimeout(function() {
                    $(".alert").fadeTo(500, 0).slideUp(500, function(){
                        $(this).remove();
                    });
                }, 10000);
            });    
        </script>

      <script type="text/javascript" >
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
      </script>
  

@endsection