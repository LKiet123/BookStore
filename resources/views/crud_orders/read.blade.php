@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">
                        <h4>Order view
                            <a href="{{ route('orders.createOrder') }}" class="btn btn-primary float-end">Add new order</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered text-center">
                            <thead>
                            <tr>
                                <th>order ID</th>
                                <th>user id</th>
                                <th>order date</th>
                                <th>status</th>
                                <th>tracking number</th>
                                <th>carrier</th>
                                <th>coupon id</th>
                                <th>total price</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>{{ $order->order_id}}</th>
                                    <th>{{ $order->user_id}}</th>
                                    <th>{{ $order->order_date}}</th>
                                    <th>{{ $order->status}}</th>
                                    <th>{{ $order->tracking_number}}</th>
                                    <th>{{ $order->carrier}}</th>
                                    <th>{{ $order->coupon_id}}</th>
                                    <th>{{ number_format($order->total_price/1000,3)}}đ</th>

                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection