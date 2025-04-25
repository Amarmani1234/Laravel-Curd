
@extends('layouts.main')
@push('title')
<title>Home</title>
@endpush
@section('main-section')



<body>
    <div class="container mt-5">
        <h1>Create New Post</h1>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('blog') }}" method="POST">
    @csrf
    
    @auth
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
    @endauth
    
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>              
    </div>
    
    <div class="mb-3">
        <label for="body" class="form-label">Content</label>
        <textarea class="form-control" id="body" name="body" rows="5" required>{{ old('body') }}</textarea>
    </div>
    
    <div class="mb-3">
        <label for="status" class="form-label">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="draft" {{ old('status') == 'draft' ? 'selected' : '' }}>Draft</option>
            <option value="published" {{ old('status') == 'published' ? 'selected' : '' }}>Published</option>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Create Post</button>
</form>
    </div>
</body>
</html>


@endsection()