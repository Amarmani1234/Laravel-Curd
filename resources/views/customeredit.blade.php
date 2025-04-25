@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')


<form action="{{route('services.updated', $product->id)}}" method="POST">
@csrf
<input type="text" name="service" value="{{$product->service}}"><br><br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>

@endsection()