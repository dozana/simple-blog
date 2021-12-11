@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Create Category</div>
        <div class="card-body">

            @if($errors->any())
                <ul class="list-unstyled text-danger mb-3">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="title">Category Name</label>
                    <input type="text" id="title" name="title" class="form-control">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Add</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
