@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Create Product</h5>
                <a href="{{ route('admin.products.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
            </div>
        </div>
        <div class="card-body">

            @include('admin.partials.errors')

            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="price">Price</label>
                        <input type="text" id="price" name="price" class="form-control" value="{{ old('price') }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="image" name="image">
                        <label class="custom-file-label" for="image">Choose Image</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <input id="description" type="hidden" name="description" value="{{ old('description') }}">
                    <trix-editor input="description"></trix-editor>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('styles')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css">
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"></script>
@endsection
