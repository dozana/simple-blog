@extends('site.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 col-md-12 col-xl-12">

            <div class="card mb-4">
                <div class="card-header">
                    {{ $product->title }}
                </div>
                <div class="card-body">

                    <ul class="list-unstyled">
                        <li>Price: {{ $product->price }} $</li>
                    </ul>

                    <div class="text-center mb-3">
                        <img class="rounded-md" src="{{ asset('/storage/'.$product->image) }}" alt="...">
                    </div>

                    {!! $product->description !!}
                </div>
            </div>

        </div>
    </div>
@endsection
