@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <h5 class="my-1">Products</h5>
                <a href="{{ route('products.create') }}" class="btn btn-success btn-sm">Add Product</a>
            </div>
        </div>
        <div class="card-body">
            @if($products->count() > 0)
                <table class="table table-borderless table-hover table-sm mb-0">
                    <thead>
                    <tr class="bg-dark text-white">
                        <th>Image</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th class="col-3 text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="align-middle"><img src="{{ asset('/storage/'.$product->image) }}" width="60" height="60" alt=""></td>
                            <td class="align-middle">{{ $product->title }}</td>
                            <td class="align-middle">{{ $product->price }}</td>
                            <td class="align-middle text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>

                                <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
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
                No products yet.
            @endif
        </div>
    </div>
@endsection
