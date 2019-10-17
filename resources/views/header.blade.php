<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="/">MMG-BLOG</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto"> <li class="nav-item">
                <a class="nav-link" href="{{route('categories.index')}}">Categories</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('posts.index')}}">Posts</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('posts.create')}}">Create Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('categories.create')}}">Create Category</a>
            </li>
        </ul>
    </div>
</nav>
