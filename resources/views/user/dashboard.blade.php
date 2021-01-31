@extends('layouts.guest')

@section('title')
Foodapp | User Dashboard
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-primary card-header-warning">
                <h4 class="card-title">My Orders</h4>
            </div>
            <div class="card-body">
                @if(Session::has('success'))
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-md-offset-4 col-md-offset-3">
                        <div id="charge-message" class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    </div>
                </div>
                @endif
                <div class="table-responsive">
                    <table id="dataTable" class="table">
                        <thead class="text-primary">
                            <th>NAME</th>
                            <th>USERID</th>
                            <th>ADDRESS</th>
                            <th>ORDER</th>
                            <th>TOTAL</th>
                            <th>PAYMENT ID</th>
                            <th>TIME</th>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->name }}</td>
                                <td>{{ $order->user_id }}</td>
                                <td>{{ $order->address }}</td>
                                <td>
                                    @foreach($order->cart->items as $item)
                                    <li class="list-group-item">
                                        {{ $item['qty'] }} Units of {{ $item['item']['dish'] }} @
                                        <span class="badge">KES {{ $item['price'] }}</span>
                                    </li>
                                    @endforeach
                                </td>
                                <td>KES {{ $order->cart->totalPrice }}</td>
                                <td>{{ $order->payment_id }}</td>
                                <td>{{ $order->created_at }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script>
        $(document).ready( function () {
            $('#dataTable').DataTable();
        });
    </script>
@endsection
