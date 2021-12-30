@extends('admin.app')

@section('content')
    <div class="card card-default mb-3">
        <div class="card-header">
            <h5 class="my-1">Goutte Scraper</h5>
        </div>
        <div class="card-body">
            @foreach($data as $key => $value)
                {{ $key }} - {{ $value }}
            @endforeach
        </div>
    </div>
    <small>https://packagist.org/packages/weidner/goutte</small>
@endsection
