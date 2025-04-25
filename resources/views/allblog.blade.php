@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')


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
                  User Blogs
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
                          <th>S.No</th>  
                          <th>Title</th>
                          <th>Slug</th>
                          <th>Body</th>                         
                          <th colspan="2">Action</th>
                        </tr>
                      </thead>
                      <tbody>
    @foreach($products as $index => $product)
    <tr>
        <td class="text-secondary">{{ $product->title }}</td>
        <td class="text-secondary">{{ $product->slug }}</td>
        <td class="text-secondary">{{ Str::limit($product->body, 50) }}</td>
        <td>
            <!-- Edit & Delete -->
            <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report-{{$product->id}}">Edit</a> 
                <!-- Delete Form -->
                <form action="{{ route('allblog.destroy', $product->id) }}" method="POST" style="display:inline;"
                      onsubmit="return confirm('Are you sure you want to move this post to trash?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                </form>
          
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
<!------------------------------------------------------------------------------->  
@foreach($products as $product)
<div class="modal modal-blur fade" id="modal-report-{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Update Blog: {{$product->title}}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('blogupdate', $product->id) }}" method="POST">
        @csrf
        @method('POST')
        
        <div class="modal-body">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" name="title" value="{{ $product->title }}" placeholder="Blog Title">
        </div>
        
        <div class="modal-body">
          <label class="form-label">Slug</label>
          <input type="text" class="form-control" name="slug" value="{{ $product->slug }}" placeholder="Blog Slug">
        </div>
        
        <div class="modal-body">
          <label class="form-label">Body</label>
          <textarea class="form-control" name="body" placeholder="Blog Content">{{ $product->body }}</textarea>
        </div>
        
        <div class="modal-footer">
          <a href="#" class="btn btn-link link-secondary" data-bs-dismiss="modal">Cancel</a>
          <button type="submit" class="btn btn-primary ms-auto">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>
@endforeach
<!------------------------------------------------------------------------------->
@endsection()