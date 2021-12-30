<ul class="list-group mb-4">
    <li class="list-group-item">
        <a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Web Blog
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.slides.index') }}">Slides</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.categories.index') }}">Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.tags.index') }}">Tags</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.posts.index') }}">Posts</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.trashed-posts.index') }}">Trashed</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Web Shop
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.products.index') }}">Products</a>
    </li>
</ul>

@if(auth()->user()->isAdmin())
<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        User Management
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.users.index') }}">Users</a>
    </li>
</ul>
@endif

<ul class="list-group mb-3">
    <li class="list-group-item text-center active" aria-current="true">
        Features
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.links.index') }}">Links</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.corona-virus') }}">Scrap Website</a>
    </li>
</ul>



