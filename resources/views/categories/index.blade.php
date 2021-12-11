@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            ...
        </div>
    </div>
@endsection
