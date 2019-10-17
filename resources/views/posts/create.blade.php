@extends('app')
@section('content')
    <div class="container">
        <h2>Create Post</h2>
        <form action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <textarea rows="3" class="form-control" id="content" name="content"></textarea>
            </div>
            <div class="form-group">
                @error('file')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                <label for="file">File</label>
                <input type="file" class="form-control-file" id="file" name="file">
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach ($categories as $key => $value)
                        <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">Save</button>
            </div>
        </form>
    </div>
@endsection


