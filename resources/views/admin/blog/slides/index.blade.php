@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Slides</h5>
                <a href="{{ route('admin.slides.create') }}" class="btn btn-success btn-sm">Add Slide</a>
            </div>
        </div>
        <div class="card-body">
            @if($slides->count() > 0)
                <table class="table table-sm table-hover mb-0">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Image</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th class="col-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($slides as $slide)
                        <tr>
                            <td><img src="{{ asset('storage/'.$slide->image) }}" width="180" height="80" alt=""></td>
                            <td class="align-middle">{{ $slide->title }}</td>
                            <td class="align-middle">{{ $slide->body }}</td>
                            <td class="text-center align-middle">
                                <a href="{{ route('admin.slides.edit', $slide->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('admin.slides.destroy', $slide->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No Slides yet.
            @endif
        </div>
    </div>
@endsection
