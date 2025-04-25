@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')
<body>
<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>--->

<!---------------------------------------------------------------------------->
<div class="modal modal-blur fade" id="modal-team" tabindex="-1" role="dialog" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">

@if ($errors->any())
        <div>
            <ul style="color:red;">
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('customer.store')}}" method="POST">
    @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Add Customer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row mb-3 align-items-end">
              <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" name="customer" class="form-control" placeholder="Name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Mobile No</label>
                <input type="text" name="phone" class="form-control" placeholder="mobile No" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Alternate No</label>
                <input type="text" name="mobile" class="form-control" placeholder="alternate No">
              </div>
              <div class="col-md-6">
                <label class="form-label">Email Id</label>
                <input type="email" name="email" class="form-control" placeholder="email" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Company</label>
                <input type="text" name="company" class="form-control" placeholder="Company Name">
              </div>
              <div class="col-md-6">
                <label class="form-label">GST No</label>
                <input type="text" name="gst" class="form-control" placeholder="GST No">
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Pin Code</label>
                <input type="text" name="pin" class="form-control" placeholder="Pin code">
              </div>

              <div class="col-md-6">
                <label class="form-label">City</label>
                <input type="text" name="city" class="form-control" placeholder="city">
              </div>

              <div class="col-md-12">
                <label class="form-label">State</label>
                <input type="text" name="state" class="form-control" placeholder="state">
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn me-auto" data-bs-dismiss="modal">Close</button>
            <input type="submit" name="submit" class="btn btn-primary" data-bs-dismiss="modal" value="Add Team">
        </div>
        </div>
      </div>
    </div>
    </form>
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
              <h2 class="page-title">All Customer</h2>
              </div>
                           
<div class="col-lg-4">
<div class="btn-list">
<a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal-team">Add new customer</a>
</div>
</div>


<div class="col-lg-4">
<h4>Upload CSV File</h4>
    <form action="{{ route('import.csv') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file" required>
        <button type="submit" class="btn btn-primary">Import</button>
    </form>
    </div>

           </div>
            </div>
          </div>
        </div>
        <!-- Page body -->
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
                          <th>Alternate No</th>
                          <th>Email</th>
                          <th>Company</th>                          
                          <th>Pin Code</th>
                          <th>City</th>
                          <th>State</th>
                          <th>Action</th>
                          <th class="w-1"></th> 
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($products as $product)
                        <tr>
                        <td class="text-secondary">{{$product->customer}}</td>
                         <td class="text-secondary">{{$product->phone}}</td>
                         <td class="text-secondary">{{$product->mobile}}</td>
                         <td class="text-secondary">{{$product->email}}</td>
                         <td class="text-secondary">{{$product->company}}</td>
                         <td class="text-secondary">{{$product->pin}}</td>
                         <td class="text-secondary">{{$product->city}}</td>
                         <td class="text-secondary">{{$product->state}}</td>
                         <td>   
                         <a href="#" class="btn btn-primary d-none d-sm-inline-block" data-bs-toggle="modal" data-bs-target="#modal-report-{{$product->id}}">Edit</a>
                         <form action="{{route('customer.destroy', $product->id)}}" method="POST" style="display:inline;">
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
          <h5 class="modal-title">Update Service: {{$product->customer}}</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{route('customer.updates', $product->id)}}" method="POST">
          @csrf
          <div class="container">
          <div class="row">
          <div class="col-md-6">
              <label class="form-label">Customer name</label>
              <input type="text" class="form-control" name="customer" value="{{$product->customer}}">
         </div>
          <div class="col-md-6">
              <label class="form-label">Mobile No</label>
              <input type="text" class="form-control" name="phone" value="{{$product->phone}}" >
          </div>
          <div class="col-md-6">
              <label class="form-label">Alternate No</label>
              <input type="text" class="form-control" name="mobile" value="{{$product->mobile}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="email" class="form-control" name="email" value="{{$product->email}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">Company</label>
              <input type="text" class="form-control" name="company" value="{{$product->company}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">GST No</label>
              <input type="text" class="form-control" name="gst" value="{{$product->gst}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">Pin No</label>
              <input type="text" class="form-control" name="pin" value="{{$product->pin}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">City</label>
              <input type="text" class="form-control" name="city" value="{{$product->city}}">
          </div>
          <div class="col-md-6">
              <label class="form-label">State</label>
              <input type="text" class="form-control" name="state" value="{{$product->state}}">
          </div>

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