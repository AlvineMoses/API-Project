@extends('layouts.guest')

@section('title')
Foodapps | Checkout
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-warning">
                <h1 class="card-title">Checkout</h1>
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                        <h4>Your Total: KES {{ $total }}</h4>
                        <div id="charge-error" class="alert-danger" {{ !Session::has('error') ? 'hidden' : ''}}>
                            {{ Session::get('error') }}
                        </div>
                        <br>
                        <form action="{{ route('postCheckout')}}" method="post" id="checkout-form">
                            {{ csrf_field() }}
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" id="name" class="form-control" required name="name">
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" id="address" class="form-control" required name="address">
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-name">Card Holder Name</label>
                                        <input type="text" id="card-name" class="form-control" required>
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-number">Credit Card Number</label>
                                        <input type="text" id="card-number" class="form-control" required>
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-expiry-month">Expiration Month</label>
                                        <input type="text" id="card-expiry-month" class="form-control" required>
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-expiry-year">Expiration Year</label>
                                        <input type="text" id="card-expiry-year" class="form-control" required>
                                    </div>
                                </div><br>
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label for="card-cvc">CVC</label>
                                        <input type="text" id="card-cvc" class="form-control" required>
                                    </div>
                                </div><br>
                            <button type="submit" class="btn btn-success">Pay now</button>
                        </form>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ URL::to('src/js/checkout.js') }}"></script>
@endsection
