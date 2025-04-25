

<form action="{{ route('tables.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="user_type">User Type</label>
            <select name="user_type" class="form-control" required>
                <option value="Admin" {{ $product->user_type == 'Admin' ? 'selected' : '' }}>Admin</option>
                <option value="User" {{ $product->user_type == 'User' ? 'selected' : '' }}>User</option>
                <option value="Reseller" {{ $product->user_type == 'Reseller' ? 'selected' : '' }}>Reseller</option>
            </select>
        </div>
        <button type="submit" class="btn btn-success mt-3">Update</button>
    </form>

