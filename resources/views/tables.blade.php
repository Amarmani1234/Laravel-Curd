@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')



    <div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">

        <form class="card card-md" method="post" action="{{route('tables')}}">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Users</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
          <div class="card-body">
            <div class="mb-3">
              <label class="form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Enter name">
            </div>
            <div class="mb-3">
              <label class="form-label">Mobile No</label>
              <input type="number" name="phone" class="form-control" placeholder="Enter name">
            </div>
            <div class="mb-3">
              <label class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" placeholder="Enter email">
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <div class="input-group input-group-flat">
                <input type="password" name="password" class="form-control"  placeholder="Password">
                <span class="input-group-text">
                  <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                  </a>
                </span>
              </div>
            </div>
            <div class="form-footer">
              <button type="submit" class="btn btn-primary w-100">Add new user</button>
            </div>
          </div>
        </form>
      <!---  <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal" value="Add Team">
        </div>---------->
      </div>
    </div>
    </div>
</div>
</div>

<!---------------------------------------------------------------------------->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif

    <script src="public/js/demo-theme.min.js"></script>
    <div class="page">
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container">
            <div class="row g-2 align-items-center">
              <div class="col-lg-4">
              </div>
                           
<div class="col-lg-4">
<div class="btn-list">
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-team">Add new users</a>
</div>
</div>



<body>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
    <script>
        Swal.fire({
            title: 'Success!',
            text: '{{ session('success') }}',
            icon: 'success',
            confirmButtonText: 'OK'
        });
    </script>
@endif
<!--------------------------------------------------------------->
    <div class="page">
      <div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">
                <h2 class="page-title">
                  All admin and user records
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container">
            <div class="row row-cards">
              <div class="col-lg-12">
                <div class="card" style="width:1200px;">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>  
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Email</th>
                          <th>Role</th>
                          <th>Address</th>
                          <th>Pin Code</th>                         
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                        <tr>
                          <td class="text-secondary">{{$product->name}}</td>
                          <td class="text-secondary">{{$product->phone}}</td>
                          <td class="text-secondary">{{$product->email}}</td>
                          <td class="text-secondary">{{$product->user_type}}</td>                        
                          <td class="text-secondary">New Delhi</td>
                          <td>110059</td>
                          <td>
                        <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report-{{$product->id}}">Edit</a>    
                        <form action="{{route('tables.dead', $product->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-primary" name="submit" value="Delete">
                        </form>
                      </td>
                        </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
                </div>
              </div>
            </div>
          </div>
        </div> 
        
<!---------------------------------------------------------------------->
@foreach($products as $product)
  <div class="modal modal-blur fade" id="modal-report-{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Service: {{$product->name}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('tables.update', $product->id)}}" method="POST">
          @csrf
          <div class="modal-body">
          
              <label class="form-label">Customer name</label>
              <input type="text" class="form-control" name="name" value="{{$product->name}}" placeholder="Service">
            </div>
       
          <div class="modal-body">
          
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{$product->email}}" placeholder="Service">
            </div>
       
          <div class="modal-body">
              <label class="form-label">User Type</label>
                   <select name="user_type" class="w-full border rounded p-2">
                    <option value="Admin" {{ $product->user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                    <option value="User" {{$product->user_type == 'User' ? 'selected' : '' }}>User</option>
                    <option value="Reseller" {{$product->user_type == 'Reseller' ? 'selected' : '' }}>Reseller</option>
                  </select>
                @error('user_type')
                    <span class="text-red-500 text-sm">{{$message}}</span>
                @enderror
            </div>
          <div class="modal-body">
              <label class="form-label">Mobile No</label>
              <input type="text" class="form-control" name="phone" value="{{$product->phone}}" placeholder="Service">
            </div>
          <div class="modal-footer">
            <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
            <input type="submit" value="Update" class="btn btn-primary ms-auto">
          </div>
        </form>
      </div>
    </div>
  </div>
@endforeach  
@endsection()