@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <h5 class="my-1">Edit Profile</h5>
        </div>
        <div class="card-body">

            @include('admin.partials.errors')

            <form action="{{ route('admin.users.update-profile') }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
                </div>
                <div class="form-group">
                    <label for="about">About Me</label>
                    <textarea name="about" id="about" cols="5" rows="5" class="form-control">{{ $user->about }}</textarea>
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
