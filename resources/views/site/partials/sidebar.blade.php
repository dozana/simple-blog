<div class="sidebar px-4 py-md-0">

    <h6 class="sidebar-title">Search</h6>

    <form class="input-group" action="{{ route('site.home') }}" method="GET">
        <input type="text" class="form-control" name="search" placeholder="Search" value="{{ request()->query('search') }}" />
        <div class="input-group-addon">
            <span class="input-group-text"><i class="ti-search"></i></span>
        </div>
    </form>

    <hr>

    <h6 class="sidebar-title">Categories</h6>
    <div class="row link-color-default fs-14 lh-24">
        @foreach($categories as $category)
            <div class="col-6"><a href="{{ route('site.posts.category', $category->id) }}">{{ $category->title }}</a></div>
        @endforeach
    </div>

    <hr>

{{--    <h6 class="sidebar-title">Top posts</h6>--}}
{{--    @foreach($topPosts as $topPost)--}}
{{--        <a class="media text-default align-items-center mb-5" href="{{ route('site.posts.show', $topPost->id) }}">--}}
{{--            <img class="rounded w-65px mr-4" src="{{ asset('/storage/'.$topPost->image) }}">--}}
{{--            <p class="media-body small-2 lh-4 mb-0">--}}
{{--                {{ str_limit($topPost->description, 50, '...') }}--}}
{{--            </p>--}}
{{--        </a>--}}
{{--    @endforeach--}}
{{--    <hr>--}}

    <h6 class="sidebar-title">Tags</h6>
    <div class="gap-multiline-items-1">
        @foreach($tags as $tag)
            <a class="badge badge-secondary" href="{{ route('site.posts.tag', $tag->id) }}">{{ $tag->title }}</a>
        @endforeach
    </div>

    <hr>

    <h6 class="sidebar-title">About</h6>
    <p class="small-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aspernatur assumenda, deleniti dicta in ipsam minus, molestias odit quae qui quis sequi similique suscipit voluptate! Consequuntur placeat reiciendis ut.</p>

</div>
