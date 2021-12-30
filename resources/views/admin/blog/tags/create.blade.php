@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Create Tag</h5>
                <a href="{{ route('admin.tags.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
            </div>
        </div>
        <div class="card-body">
            @include('admin.partials.errors')
            <form action="{{ route('admin.tags.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Tag Name</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
