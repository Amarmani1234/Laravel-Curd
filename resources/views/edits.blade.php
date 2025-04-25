

<form action="{{route('customer.updates', $product->id) }}" method="POST">
@csrf
<input type="text" name="customer" value="{{ $product->customer}}"><br><br>
<input type="text" name="email" value="{{ $product->email}}"><br><br>
<input type="text" name="phone" value="{{ $product->phone}}"><br><br>
<button type="submit" class="btn btn-primary">Submit</button>
</form>

