@extends('site.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xl-12">

            <div class="row">
                @forelse($products as $product)
                    <div class="col-md-3">
                        <div class="card mb-3">
                            <a href="{{ route('site.products.show', $product->id) }}">
                                <img class="card-img-top" src="{{ asset('/storage/'.$product->image) }}" alt="">
                            </a>
                            <div class="card-body">
                                <ul class="list-unstyled">
                                    <li><a href="{{ route('site.products.show', $product->id) }}">{{ $product->title }}</a></li>
                                    <li>Price: {{ $product->price }} $</li>
                                </ul>

                                <a href="#" class="btn btn-primary btn-sm">Add to cart</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-12">
                        No results found for query
                    </div>
                @endforelse
            </div>

            {{ $products->links() }}

        </div>
    </div>
@endsection
