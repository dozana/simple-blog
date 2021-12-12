@extends('layouts.app')

@section('content')
    <div class="card card-default">
        <div class="card-header">Update Category</div>
        <div class="card-body">

            @if($errors->any())
                <ul class="list-unstyled text-danger mb-3">
                    @foreach($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif

            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Category Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="{{ $category->title }}">
                </div>
                <div class="form-group mb-0">
                    <button type="submit" class="btn btn-success btn-sm">Update</button>
                    <a href="{{ route('categories.index') }}" class="btn btn-outline-dark btn-sm">Go Back</a>
                </div>
            </form>
        </div>
    </div>
@endsection
