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
                                    <a href="{{ route('site.posts.show', $post->id) }}">
                                        <img class="card-img-top" src="{{ asset('/storage/'.$post->image) }}" alt="">
                                    </a>
                                    <div class="p-6 text-center">
                                        <p>{{ $post->category->title }}</p>
                                        <h5 class="mb-0">
                                            <a class="text-dark" href="{{ route('site.posts.show', $post->id) }}">
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
                    @include('site.partials.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
