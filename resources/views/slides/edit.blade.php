@extends('layouts.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Edit Slide</h5>
                <a href="{{ route('slides.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
            </div>
        </div>
        <div class="card-body">

            @include('partials.errors')

            <form action="{{ route('slides.update', $slide->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $slide->title }}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input id="body" type="hidden" name="body" value="{{ $slide->body }}">
                    <trix-editor input="body"></trix-editor>
                </div>
                <div class="form-group">
                    <p><img src="{{ '/storage/'.$slide->image }}" alt="" width="180" height="80"></p>
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.min.js"></script>
@endsection
