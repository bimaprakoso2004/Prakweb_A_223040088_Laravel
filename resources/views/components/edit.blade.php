@extends('dashboard.layouts.main')

@section('container')
<div class="d-flex mb-3 border-bottom">
    <h1 class="h2">Edit Post: {{ $post->title }}</h1>
</div>

<div class="card mb-4">
    <div class="card-body">
        <form action="/dashboard/posts/{{ $post->id }}" method="POST">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $post->title) }}" required>
                @error('title')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea class="form-control" id="body" name="body" rows="5" required>{{ old('body', $post->body) }}</textarea>
                @error('body')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Post</button>
            <a href="/dashboard/posts" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection