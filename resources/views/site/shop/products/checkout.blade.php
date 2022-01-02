@extends('site.app')

@section('content')

    <div class="row">
        <div class="col-lg-6 col-md-8 mx-auto">

            <h4 class="mb-4">Checkout</h4>

            <p>Your Total: ${{ $total }}</p>

            <div id="chargeError" class="alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
                {{ Session::get('error') }}
            </div>

            <form action="{{ route('site.products.checkout') }}" method="post" id="checkoutForm">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="name">Name On Card</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="card_name">Card Holder Name</label>
                            <input type="text" id="card_name" name="card_name" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="card_number">Card Number</label>
                                    <input type="text" id="card_number" name="card_number" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="card_expiry_month">Expiration Month</label>
                                    <input type="text" id="card_expiry_month" name="card_expiry_month" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="card_expiry_year">Expiration Year</label>
                                    <input type="text" id="card_expiry_year" name="card_expiry_year" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="card_cvc">CVC</label>
                                    <input type="text" id="card_cvc" name="card_cvc" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success">Buy Now</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

@endsection

@section('scripts')
    <script src="https://js.stripe.com/v3/"></script>
    <script src="{{ asset('js/checkout.js') }}"></script>
@endsection
