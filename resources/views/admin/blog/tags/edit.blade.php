@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">Update Tag</div>
        <div class="card-body">

            @include('admin.partials.errors')

            <form action="{{ route('admin.tags.update', $tag->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Tag Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $tag->title }}">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
