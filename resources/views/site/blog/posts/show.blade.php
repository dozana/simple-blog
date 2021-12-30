@extends('site.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xl-12">

            <div class="card mb-4">
                <div class="card-header">
                    {{ $post->title }}
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li><img src="{{ Gravatar::src($post->user->email) }}" alt="" class="border p-3 mb-3"></li>
                        <li>Author: {{ $post->user->name }}</li>
                        <li>Published at {{ $post->published_at }}</li>
                        <li>Category: {{ $post->category->title }}</li>
                        <li>
                            @foreach($post->tags as $tag)
                                <a class="badge badge-pill badge-secondary" href="{{ route('site.posts.tag', $tag->id) }}">{{ $tag->title }}</a>
                            @endforeach
                        </li>
                    </ul>

                    <div class="text-center my-8">
                        <img class="rounded-md" src="{{ asset('/storage/'.$post->image) }}" alt="...">
                    </div>

                    {!! $post->body !!}
                </div>
            </div>

            <div class="media-list mb-3">
                <div class="media">
                    <img class="avatar avatar-sm mr-4" src="https://placehold.co/80x80" alt="...">
                    <div class="media-body">
                        <div class="small-1">
                            <strong>Levan Sz</strong>
                            <time class="ml-4 opacity-70 small-3" datetime="2021-12-25 20:00">24 min ago</time>
                        </div>
                        <p class="small-2 mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis commodi eligendi molestias porro quas temporibus?</p>
                    </div>
                </div>
            </div>

            <form action="#" method="POST" class="mb-3">
                <div class="row">
                    <div class="form-group col-12 col-md-6">
                        <input class="form-control" type="text" placeholder="Name">
                    </div>
                    <div class="form-group col-12 col-md-6">
                        <input class="form-control" type="text" placeholder="Email">
                    </div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" placeholder="Comment" rows="4"></textarea>
                </div>
                <button class="btn btn-primary btn-block" type="submit">Submit your comment</button>
            </form>

        </div>
    </div>
@endsection
