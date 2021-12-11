@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('categories.create') }}" class="btn btn-success btn-sm">Add Category</a>
    </div>

    <div class="card card-default">
        <div class="card-header">Categories</div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-sm mb-0">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Created At</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{ $category->title }}</td>
                            <td>{{ $category->created_at }}</td>
                            <td class="text-center">
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-primary btn-sm">Edit</a>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
