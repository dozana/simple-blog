@extends('site.app')

@section('content')

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12">
                <ul class="list-group mb-3">
                    @foreach($products as $product)
                        <li class="list-group-item">
                            <span class="badge">{{ $product['qty'] }}</span>
                            <strong>{{ $product['item']['title'] }}</strong>
                            <span class="label label-success">{{ $product['price'] }}</span>

                            <div class="btn-group ml-3" role="group">
                                <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a class="dropdown-item" href="#">Reduce by 1</a>
                                    <a class="dropdown-item" href="#">Reduce All</a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <p>
                    Total: {{ $totalPrice }}
                </p>

                <button type="button" class="btn btn-success btn-sm">Checkout</button>

            </div>
        </div>
    @else
        Please add products from <a href="{{ route('products.index') }}">store</a>
    @endif
@endsection
