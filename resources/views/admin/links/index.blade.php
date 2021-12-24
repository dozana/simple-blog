@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Links</h5>
                <a href="javascript:void(0)" class="btn btn-success btn-sm" id="create-new-link">Add Links</a>
            </div>
        </div>
        <div class="card-body">
            @if($links->count() > 0)
                <table class="table table-borderless table-hover table-sm mb-0" id="laravel_crud">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>Title</th>
                        <th>URL</th>
                        <th class="col-3 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody id="links-crud">
                    @foreach($links as $link)
                        <tr>
                            <td>{{ $link->title }}</td>
                            <td>{{ $link->url }}</td>
                            <td class="text-center">
                                <a href="javascript:void(0)"
                                   class="btn btn-outline-dark btn-sm mb-1 show-modal"
                                   id="show-link"
                                   data-id="{{ $link->id }}">Show</a>

                                <a href="javascript:void(0)"
                                   class="btn btn-primary btn-sm mb-1 edit-modal"
                                   id="edit-link"
                                   data-id="{{ $link->id }}">Edit</a>

                                <a href="javascript:void(0)"
                                   class="btn btn-danger btn-sm mb-1 delete-modal"
                                   id="delete-link"
                                   data-id="{{ $link->id }}">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No links yet.
            @endif
        </div>
    </div>

    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form action="" method="POST" id="createLinkForm">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createModalLabel">New Link</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Web form
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Go back</button>
                        <button type="submit" class="btn btn-danger">Yes, Delete</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
