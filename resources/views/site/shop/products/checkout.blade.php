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
                            <label for="fullName">Name</label>
                            <input type="text" id="fullName" name="fullName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" id="address" name="address" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cardName">Card Holder Name</label>
                            <input type="text" id="cardName" name="cardName" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="cardNumber">Credit Card Number</label>
                            <input type="text" id="cardNumber" name="cardNumber" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiryMonth">Expiration Month</label>
                                    <input type="text" id="cardExpiryMonth" name="cardExpiryMonth" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="cardExpiryYear">Expiration Year</label>
                                    <input type="text" id="cardExpiryYear" name="cardExpiryYear" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="cardCvc">CVC</label>
                            <input type="text" id="cardCvc" name="cardCvc" class="form-control" required>
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
