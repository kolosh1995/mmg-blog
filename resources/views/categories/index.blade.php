@extends('app')
@section('content')
    <div class="col-6 col-md">
        <h5>Categories</h5>
        <ul class="list-unstyled text-small">
            @foreach($categories as $category)
                <li><a class="text-muted" href="{{route('categories.show', $category)}}">{{$category->getName()}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
