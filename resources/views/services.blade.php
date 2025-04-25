@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')
<body>
<!-------------------------------------------------------------->
<div class="page-wrapper">
        <div class="page-header d-print-none">
          <div class="container-xl">
            <div class="row g-2 align-items-center">
              <div class="col">               
              </div>
              <div class="col-auto ms-auto d-print-none">
                <div class="btn-list">                
                <button class="btn btn-primary" id="open-popup-btn">Add New Service</button>
                </div>
              </div>
            </div>
          </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<style>
            .popup-overlay {
            display: none; 
            position: fixed; 
            top: 0; 
            left: 0; 
            width: 100%; 
            height: 100%; 
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }
        .popup-form {
            background: #fff; 
            width: 300px; 
            margin: 100px auto; 
            padding: 20px; 
            border-radius: 8px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            position: relative;
        }
        .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="text"], input[type="email"] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            padding: 10px 20px;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <div class="popup-overlay">
        <div class="popup-form">
            <span class="close-btn">&times;</span>
            <h2>Service</h2>
            <form id="popup-form" method="post" action="{{route('insertdata')}}">
              @csrf
                <input type="text" name="service" placeholder="Your Services" required>
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#open-popup-btn').click(function() {
                $('.popup-overlay').fadeIn();
            });
            $('.close-btn, .popup-overlay').click(function(e) {
                if (e.target !== this) return;
                $('.popup-overlay').fadeOut();
            });
            $('.popup-form').click(function(e) {
                e.stopPropagation();
            });
           
        });
    </script>
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
                  All Service
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-cards">
              <div class="col-lg-12">
                <div class="card">
                  <div class="table-responsive">
                    <table class="table table-vcenter card-table">
                      <thead>
                        <tr>
                          <th>Services</th>
                          <th>Mobile No</th>
                          <th>Name</th>
                          <th>Company</th>
                          <th>Services</th>
                          <th>Address</th>
                          <th>Pin Code</th>                          
                          <th>Action</th>
                          <th class="w-1"></th> 
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                        <tr>
                        <td class="text-secondary">{{$product->service}}</td>
                        <td class="text-secondary">9599866380</td>
                         <td class="text-secondary">name</td>
                         <td class="text-secondary">company</td>
                         <td class="text-secondary">service</td>
                         <td class="text-secondary">New Delhi</td>
                         <td class="text-secondary">110059</td>
                         <td>
                         <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report-{{$product->id}}">Edit</a>
                        <form action="{{route('services.remove', $product->id)}}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <input type="submit" class="btn btn-primary" name="submit" value="Delete">
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
  @foreach($products as $product)
  <div class="modal modal-blur fade" id="modal-report-{{$product->id}}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Service: {{$product->service}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('services.updated', $product->id)}}" method="POST">
          @csrf
          <div class="modal-body">
            <div class="mb-3">
              <label class="form-label">Service Name</label>
              <input type="text" class="form-control" name="service" value="{{$product->service}}" placeholder="Service">
            </div>
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