@extends('site.app')

@section('title')
    Shop
@endsection

@section('content')
    @foreach($products->chunk(4) as $productChunk)
    <div class="row">
        @forelse($productChunk as $product)
            <div class="col-md-3">
                <div class="card mb-3">

                    <div class="card-header">
                        <h4><a href="{{ route('site.products.show', $product->id) }}">{{ $product->title }}</a></h4>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('site.products.show', $product->id) }}">
                            <img src="{{ asset('/storage/'.$product->image) }}" class="img-fluid mb-3" alt="">
                        </a>

                        <div class="mb-3">
                            {!! $product->description !!}
                        </div>

                        <div class="row">
                            <div class="col-6">
                                {{ $product->price }} $
                            </div>
                            <div class="col-6">
                                <a href="{{ route('site.products.addToCart', $product->id) }}" class="btn btn-success btn-sm">Add to cart</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @empty
            <div class="col-md-3">
                No results found for query
            </div>
        @endforelse
    </div>
    @endforeach

    {{ $products->links() }}

@endsection

@section('scripts')

@endsection
