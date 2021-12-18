<ul class="list-group mb-4">
    <li class="list-group-item">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories.index') }}">Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('posts.index') }}">Posts</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('tags.index') }}">Tags</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('slides.index') }}">Slides</a>
    </li>
    @if(auth()->user()->isAdmin())
        <li class="list-group-item">
            <a href="{{ route('users.index') }}">Users</a>
        </li>
    @endif
</ul>
<ul class="list-group mb-3">
    <li class="list-group-item">
        <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>
    </li>
</ul>
