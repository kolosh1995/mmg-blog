@extends('app')
@section('content')
    <div class="container">
        <form action="{{route('categories.update', $category)}}" method="post">
            @csrf
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$category->getName()}}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" id="description" name="description"
                          rows="3">{{$category->getDescription()}}</textarea>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
        </form>
    </div>
@endsection



