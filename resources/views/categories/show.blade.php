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
            {{$posts->links()}}
        @endif
        @if(isset($comments))
            <h2>Comments</h2>
            <div class="row mb-2" id="comment_section">
                @foreach($comments as $comment)
                    <div class="col-md-12">
                        <div class="card flex-md-row mb-4 shadow-sm h-md-250">
                            <div class="card-body d-flex flex-column align-items-start">
                                <h3 class="mb-0">
                                    <span class="text-dark">Author: {{$comment->getAuthor()}}</span>
                                </h3>
                                <p class="card-text mb-auto">{{$comment->getContent()}}</p>
                                <p class="card-text mb-auto">Date: {{$comment->getDate()}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <label for="author">Author</label>
        <input type="text" class="form-control" id="author" name="author" required>
        <label for="content">Content</label>
        <input type="text" class="form-control" id="content" name="content" required>
        <input type="hidden" id="commentable_id" name="commentable_id" value="{{$category->getKey()}}">
        <input type="hidden" id="commentable_type" name="commentable_type" value="{{\App\Category::class}}">
        <button class="btn btn-primary" type="submit" id="comment">OK</button>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/comment.js')}}"></script>
@endsection
