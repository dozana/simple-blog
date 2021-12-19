@extends('site.app')

@section('content')
    <div class="section">
        <div class="container">

            <div class="text-center mt-8">
                <h2>{{ $post->title }}</h2>
                <ul class="list-unstyled">
                    <li>Author: {{ $post->user->name }}</li>
                    <li>Published at {{ $post->published_at }}</li>
                    <li>Category: {{ $post->category->title }}</li>
                </ul>

                <img src="{{ Gravatar::src($post->user->email) }}" alt="">
            </div>

            <div class="text-center my-8">
                <img class="rounded-md" src="{{ asset('/storage/'.$post->image) }}" alt="...">
            </div>

            <div class="row">
                <div class="col-lg-8 mx-auto">
                    {!! $post->body !!}

                    <div class="gap-xy-2 mt-6">
                        @foreach($post->tags as $tag)
                            <a class="badge badge-pill badge-secondary" href="{{ route('site.posts.tag', $tag->id) }}">{{ $tag->title }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="section bg-gray">
        <div class="container">

            <div class="row">
                <div class="col-lg-8 mx-auto">

                    <div class="media-list">

                        <div class="media">
                            <img class="avatar avatar-sm mr-4" src="../assets/img/avatar/1.jpg" alt="...">

                            <div class="media-body">
                                <div class="small-1">
                                    <strong>Maryam Amiri</strong>
                                    <time class="ml-4 opacity-70 small-3" datetime="2018-07-14 20:00">24 min ago</time>
                                </div>
                                <p class="small-2 mb-0">Thoughts his tend and both it fully to would the their reached drew project the be I hardly just tried constructing I his wonder, that his software and need out where didn't the counter productive.</p>
                            </div>
                        </div>

                    </div>


                    <hr>

                    <form action="#" method="POST">

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

        </div>
    </div>
@endsection
