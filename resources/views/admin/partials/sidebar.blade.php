<ul class="list-group mb-4">
    <li class="list-group-item">
        <a href="{{ route('admin.dashboard.index') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Blog
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.slides.index') }}"><i class="far fa-images"></i> Slides</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.categories.index') }}"><i class="fas fa-bookmark"></i> Categories</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.tags.index') }}"><i class="fas fa-tags"></i> Tags</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.posts.index') }}"><i class="fas fa-columns"></i> Posts</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.trashed-posts.index') }}"><i class="fas fa-trash"></i> Trashed</a>
    </li>
</ul>

<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Shop
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.products.index') }}"><i class="fas fa-shopping-basket"></i> Products</a>
    </li>
</ul>

@if(auth()->user()->isAdmin())
<ul class="list-group mb-4">
    <li class="list-group-item text-center active" aria-current="true">
        Users
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.users.index') }}"><i class="fas fa-users"></i> Users</a>
    </li>
</ul>
@endif

<ul class="list-group mb-3">
    <li class="list-group-item text-center active" aria-current="true">
        Features
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.links.index') }}"><i class="fas fa-link"></i> Links</a>
    </li>
    <li class="list-group-item">
        <a href="{{ route('admin.corona-virus') }}"><i class="fas fa-user-secret"></i> Scrap Website</a>
    </li>
</ul>



