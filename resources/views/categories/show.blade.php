@extends('app')
@section('content')
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{$category->getName()}}</h1>
                <p class="lead my-3">{{$category->getDescription()}}</p>
                <form action="{{route('categories.destroy', $category)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-primary" type="submit">DELETE</button>
                </form>
                <a href="{{route('categories.edit', $category)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
        @if(isset($posts))
            <h2>Posts</h2>
            <div class="row mb-2">
                @foreach($posts as $post)
                    <div class="col-md-6">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-0">
                                    <span class="text-dark">{{$post->getName()}}</span>
                                </h3>
                                <p class="card-text mb-auto">{{$post->getContent()}}</p>
                                <a href="{{route('posts.show', $post)}}">More...</a>
                                <form action="{{route('posts.destroy', $post)}}" method="post">
                                    @csrf
                                    {{method_field('DELETE')}}
                                    <button class="btn btn-primary" type="submit">DELETE</button>
                                </form>
                                <a href="{{route('posts.edit', $post)}}" class="btn btn-primary">Edit</a>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
