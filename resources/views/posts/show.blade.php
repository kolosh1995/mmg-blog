@extends('app')
@section('content')
    <div class="container">
        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
            <div class="col-md-6 px-0">
                <h1 class="display-4 font-italic">{{$post->getName()}}</h1>
                <p class="lead my-3">{{$post->getContent()}}</p>
                <a href="{{route('post.file.download', $post)}}" class="lead my-3">{{$post->getFile()}}</a>
                <form action="{{route('posts.destroy', $post)}}" method="post">
                    @csrf
                    {{method_field('DELETE')}}
                    <button class="btn btn-primary" type="submit">DELETE</button>
                </form>
                <a href="{{route('posts.edit', $post)}}" class="btn btn-primary">Edit</a>
            </div>
        </div>
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
        <input type="hidden" id="post_id" name="post_id" value="{{$post->getKey()}}">
        <button class="btn btn-primary" type="submit" id="comment">OK</button>
    </div>
@endsection
@section('script')
    <script src="{{asset('js/comment.js')}}"></script>
@endsection
