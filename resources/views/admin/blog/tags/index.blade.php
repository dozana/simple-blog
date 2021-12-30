@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Tags</h5>
                <a href="{{ route('admin.tags.create') }}" class="btn btn-success btn-sm">Add Tag</a>
            </div>
        </div>
        <div class="card-body">
            @if($tags->count() > 0)
                <table class="table table-borderless table-hover table-sm mb-0">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>Tag</th>
                        <th class="text-center">Posts Count</th>
                        <th class="col-3 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tags as $tag)
                        <tr>
                            <td>{{ $tag->title }}</td>
                            <td class="text-center">{{ $tag->posts->count() }}</td>
                            <td class="text-center">
                                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" onclick="handleDelete({{ $tag->id }})" class="btn btn-danger btn-sm">
                                    Delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form action="" method="POST" id="deleteTagForm">
                            @csrf
                            @method('delete')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Delete Tag</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this tag?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                                    <button type="submit" class="btn btn-danger">Yes, Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @else
                No tags yet.
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        function handleDelete(id) {
            const form = document.getElementById('deleteTagForm');
            form.action = '/tags/' + id;
            $('#deleteModal').modal('show');
        }
    </script>
@endsection
