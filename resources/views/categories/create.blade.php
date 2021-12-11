@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Create Category</div>
        <div class="card-body">
            <form action="">
                <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <button class="btn btn-success btn-sm">Add</button>
                </div>
            </form>
        </div>
    </div>
@endsection
