@extends('admin.app')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Categories
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.categories.index') }}">{{ $categories }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Posts
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.posts.index') }}">{{ $posts }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Trashed Posts
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.trashed-posts.index') }}">{{ $trashedPosts }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Tags
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.tags.index') }}">{{ $tags }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Slides
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.slides.index') }}">{{ $slides }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center">
                <div class="card-header">
                    All Users
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.users.index') }}">{{ $users }}</a></h1>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-center mb-3">
                <div class="card-header">
                    Products
                </div>
                <div class="card-body">
                    <h1 class="mb-0"><a href="{{ route('admin.products.index') }}">{{ $products }}</a></h1>
                </div>
            </div>
        </div>
    </div>
@endsection
