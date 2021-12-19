@extends('site.app')

@section('content')
    <div class="section bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-xl-9">
                    <div class="row gap-y">
                        @forelse($posts as $post)
                            <div class="col-md-6">
                                <div class="card border hover-shadow-6 mb-6 d-block">
                                    <a href="{{ route('site.posts.show', $post->id) }}"><img class="card-img-top" src="{{ asset('/storage/'.$post->image) }}" alt="Card image cap"></a>
                                    <div class="p-6 text-center">
                                        <p>
                                            <a class="small-5 text-lighter text-uppercase ls-2 fw-400" href="#">
                                                {{ $post->category->title }}
                                            </a>
                                        </p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="#">
                                                {{ $post->title }}
                                            </a>
                                        </h5>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="text-center">
                                No results found for query <strong>{{ request()->query('search') }}</strong>
                            </p>
                        @endforelse
                    </div>

                    {{ $posts->appends(['search' => request()->query('search')])->links() }}

                </div>
                <div class="col-md-4 col-xl-3">
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
                                <div class="col-6"><a href="#">{{ $category->title }}</a></div>
                            @endforeach
                        </div>

                        <hr>

                        <h6 class="sidebar-title">Top posts</h6>
                        @foreach($posts as $post)
                            <a class="media text-default align-items-center mb-5" href="#">
                                <img class="rounded w-65px mr-4" src="{{ asset('/storage/'.$post->image) }}">
                                <p class="media-body small-2 lh-4 mb-0">{{ $post->description }}</p>
                            </a>
                        @endforeach

                        <hr>

                        <h6 class="sidebar-title">Tags</h6>
                        <div class="gap-multiline-items-1">
                            @foreach($tags as $tag)
                                <a class="badge badge-secondary" href="#">{{ $tag->title }}</a>
                            @endforeach
                        </div>

                        <hr>

                        <h6 class="sidebar-title">About</h6>
                        <p class="small-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad architecto aspernatur assumenda, deleniti dicta in ipsam minus, molestias odit quae qui quis sequi similique suscipit voluptate! Consequuntur placeat reiciendis ut.</p>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
