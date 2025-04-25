@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')

<!-------------------------------------------------------------------->  
<h3>Trashed Posts</h3>
@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif


<!---------------------------------------------------------------------->

<div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-lg-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Mobile No</th>
                          <th>Email</th>
                          <th>Address</th>                          
                          <th>Message</th>
                          <th>Action</th>
                          <th class="w-1"></th> 
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                        <tr>
                        <td class="text-secondary">{{$product->name}}</td>
                         <td class="text-secondary">{{$product->phone}}</td>
                         <td class="text-secondary">{{$product->email}}</td>
                         <td class="text-secondary">{{$product->address}}</td>
                         <td class="text-secondary">{{$product->message}}</td>
                         <td>   
                         <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report-{{$product->id}}">Edit</a>
                         
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

@endsection()