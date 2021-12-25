@extends('site.app')

@section('content')
    <div class="row">
        <div class="col-lg-4 col-md-4 col-xl-3">
            @include('site.posts.sidebar')
        </div>
        <div class="col-lg-8 col-md-8 col-xl-9">

            @forelse($posts as $post)
                <div class="card mb-3">
                    <div class="card-header">
                        {{ $post->title }}
                    </div>
                    <a href="{{ route('site.posts.show', $post->id) }}">
                        <img class="card-img-top" src="{{ asset('/storage/'.$post->image) }}" alt="">
                    </a>
                    <div class="card-body">
                        Category: {{ $post->category->title }}
                    </div>
                </div>
            @empty
                <p class="text-center">
                    No results found for query
                    <strong>{{ request()->query('search') }}</strong>
                </p>
            @endforelse

            {{ $posts->appends(['search' => request()->query('search')])->links() }}
        </div>
    </div>
@endsection
