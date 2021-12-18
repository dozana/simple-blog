@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <h5 class="my-1">Users</h5>
        </div>
        <div class="card-body">
            @if($users->count() > 0)
                <table class="table table-borderless table-hover table-sm mb-0">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>Image</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Created At</th>
                        <th class="col-3 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">
                                <img src="{{ Gravatar::src($user->email) }}" width="40" height="40" alt="">
                            </td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ $user->created_at }}</td>
                            <td class="align-middle text-center">
                                @if(!$user->isAdmin())
                                    <form action="{{ route('users.make-admin', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">
                                            Make Admin
                                        </button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
                No users yet.
            @endif
        </div>
    </div>
@endsection
