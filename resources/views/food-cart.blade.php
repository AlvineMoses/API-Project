@extends('layouts.guest')

@section('title')
    Foodapp | Food Cart
@endsection

@section('title')
Foodapp | Food Cart
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-warning">
                <h4 class="card-title">My Food Cart</h4>
            </div>
            <div class="card-body">
                @if(Session::has('cart'))
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <ul class="list-group">
                                @foreach($menus as $menu)
                                    <li class="list-group-item">
                                        <span class="badge">{{ $menu['qty'] }}</span>
                                        <strong>{{ $menu['item']['dish'] }}</strong>
                                        <span class="label label-success">KES {{ $menu['price'] }}</span>
                                        <div class="btn-group">
                                            <a href="{{ route('getCheckout') }}"class="btn btn-primary btn-xs dropdown-toggle" data-toggle="dropdown">
                                                Action
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{ route('reduceByOne', ['id' => $menu['item']['id']]) }}">Reduce by 1</a></li>
                                                <li><a href="{{ route('removeFromCart', ['id' => $menu['item']['id']]) }}">Reduce All</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <strong>Total: KES {{ $totalPrice }} </strong>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <a href="{{ route('getCheckout') }}" type="button" class="btn btn-success">Checkout</a>
                        </div>
                    </div>
                @else
                    <div class="row">
                        <div class="col-sm-6 col-md-6 col-md-offset-3 col-sm-offset-3">
                            <h2>No Items in Cart</h2>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
