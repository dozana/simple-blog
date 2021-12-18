@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Posts</h5>
                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Add Post</a>
            </div>
        </div>
        <div class="card-body">
            @if($posts->count() > 0)
                <table class="table table-borderless table-hover table-sm mb-0">
                    <thead>
                        <tr class="bg-dark text-white">
                            <th>Image</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Category</th>
                            <th class="col-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr>
                            <td class="align-middle"><img src="{{ asset('/storage/'.$post->image) }}" width="60" height="60" alt=""></td>
                            <td class="align-middle">{{ $post->title }}</td>
                            <td class="align-middle">{{ $post->created_at }}</td>
                            <td class="align-middle">
                                <a href="{{ route('categories.edit', $post->category->id) }}">
                                    {{ $post->category->title }}
                                </a>
                            </td>
                            <td class="align-middle text-center">
                                @if($post->trashed())
                                    <form action="{{ route('restore-posts', $post->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-primary btn-sm">Restore</button>
                                    </form>
                                @else
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                @endif

                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        {{ $post->trashed() ? 'Delete' : 'Trash' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No pots yet.
            @endif
        </div>
    </div>
@endsection
