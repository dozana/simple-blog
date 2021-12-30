@extends('site.app')

@section('content')

    @if(Session::has('cart'))
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xl-12">

                <h4 class="mb-4">Shopping Cart</h4>

                <table class="table table-bordered table-hover">
                    <thead>
                        <tr class="bg-light">
                            <th>Title</th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $product)
                        <tr>
                            <td>{{ $product['item']['title'] }}</td>
                            <td>{{ $product['qty'] }}</td>
                            <td>{{ $product['price'] }} $</td>
                            <td class="text-center">
                                <div class="btn-group" role="group">
                                    <button id="btnGroupDrop1" type="button" class="btn btn-primary dropdown-toggle btn-sm" data-toggle="dropdown" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                        <a class="dropdown-item" href="#">Reduce by 1</a>
                                        <a class="dropdown-item" href="#">Reduce All</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <strong>Total:</strong> {{ $totalPrice }}
                            </td>
                        </tr>
                    </tfoot>
                </table>

                <a href="{{ route('site.products.checkout') }}" class="btn btn-success btn-sm">Checkout</a>

            </div>
        </div>
    @else
        No items in shopping cart, please <a href="{{ route('products.index') }}">add</a>
    @endif
@endsection
