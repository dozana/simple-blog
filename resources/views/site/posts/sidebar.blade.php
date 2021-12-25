<form action="{{ route('site.posts.index') }}" method="GET" class="mb-4">
    <div class="form-group">
        <input type="text" class="form-control" id="search" name="search" placeholder="Enter search keyword" value="{{ request()->query('search') }}" />
    </div>
</form>

<ul class="list-group mb-4">
    @foreach($categories as $category)
    <li class="list-group-item">
        <a href="{{ route('site.posts.category', $category->id) }}">{{ $category->title }}</a>
    </li>
    @endforeach
</ul>

<div class="mb-3" style="font-size: 20px;">
    <h6>Post Tags</h6>
    @foreach($tags as $tag)
        <a class="badge badge-secondary" href="{{ route('site.posts.tag', $tag->id) }}">
            {{ $tag->title }}
        </a>
    @endforeach
</div>

