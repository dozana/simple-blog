@extends('layouts.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">Update Post</div>
        <div class="card-body">

            @include('partials.errors')

            <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="published_at">Publication Date</label>
                        <input type="text" id="published_at" name="published_at" class="form-control" value="{{ $post->published_at }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" cols="30" rows="3" class="form-control">{{ $post->description }}</textarea>
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ $post->body }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <div class="form-group">
                    <img src="{{ asset('/storage/'.$post->image) }}" width="60" height="60" class="mb-3" alt="">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select name="category" id="category" class="form-control">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}"
                                @if(isset($post))
                                    @if($category->id === $post->category_id) selected @endif
                                @endif>
                                {{ $category->title }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        flatpickr("#published_at", {
            enableTime: true
        });
    </script>
@endsection
