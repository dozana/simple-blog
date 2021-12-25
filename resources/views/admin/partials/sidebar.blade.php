<ul class="list-group mb-4">
    <li class="list-group-item">
        <a href="{{ route('dashboard.index') }}">Dashboard</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Web Blog
    </li>
    <li class="list-group-item">
        <a href="{{ route('posts.index') }}">All Posts</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('categories.index') }}">Post Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('tags.index') }}">Post Tags</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('trashed-posts.index') }}">Trashed Posts</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Web Shop
    </li>
    <li class="list-group-item">
        <a href="{{ route('products.index') }}">Products</a>
    </li>
</ul>

@if(auth()->user()->isAdmin())
<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        User Management
    </li>
    <li class="list-group-item">
        <a href="{{ route('users.index') }}">Users</a>
    </li>
</ul>
@endif

<ul class="list-group mb-3">
    <li class="list-group-item text-center active" aria-current="true">
        Features
    </li>
    <li class="list-group-item">
        <a href="{{ route('slides.index') }}">Slides</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('links.index') }}">Links</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('corona-virus') }}">Scrap Website</a>
    </li>
</ul>



