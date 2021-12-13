@extends('layouts.app')

@section('content')
{{--    <div class="d-flex justify-content-end mb-3">--}}
{{--        <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Add Post</a>--}}
{{--    </div>--}}

    <div class="card card-default">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Posts</h5>
                <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm">Add Post</a>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-borderless table-hover table-sm mb-0">
                <thead>
                <tr class="bg-dark text-white">
                    <th>Image</th>
                    <th>Title</th>
                    <th>Created At</th>
                    <th class="text-center">Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($posts as $post)
                    <tr>
                        <td class="align-middle"><img src="{{ asset('/storage/'.$post->image) }}" width="60" height="60" alt=""></td>
                        <td class="align-middle">{{ $post->title }}</td>
                        <td class="align-middle">{{ $post->created_at }}</td>
                        <td class="text-center align-middle">
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary btn-sm">Edit</a>
{{--                            <button type="button" onclick="handleDelete({{ $post->id }})" class="btn btn-danger btn-sm">--}}
{{--                                Delete--}}
{{--                            </button>--}}

                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Trash</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <form action="" method="POST" id="deletePostForm">
                        @csrf
                        @method('delete')
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="deleteModalLabel">Delete Post</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Are you sure you want to delete this post?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                                <button type="submit" class="btn btn-danger">Yes, Delete</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            const form = document.getElementById('deletePostForm');
            form.action = '/posts/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
