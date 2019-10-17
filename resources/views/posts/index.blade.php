@extends('app')
@section('content')
    <div class="col-6 col-md">
        <h5>Posts</h5>
        <ul class="list-unstyled text-small">
            @foreach($posts as $post)
                <li><a class="text-muted" href="{{route('posts.show', $post)}}">{{$post->getName()}}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
