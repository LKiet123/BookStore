@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">



                <div class="card">
                    <div class="card-header">
                        <h4>OrderDetails view
                        <a href="{{ route('orders.listOrderDetailsByOrderId')}}?order_id={{  $orderDetails->order_id }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>order detail id	</th>
                                <th>order Id</th>
                                <th>Book Id</th>
                                <th>quantity</th>
                                <th>price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $orderDetails->order_detail_id }}</th>
                                <th>{{ $orderDetails->order_id}}</th>
                                <th>{{ $orderDetails->book_id}}</th>
                                <th>{{ $orderDetails->quantity}}</th>
                                <th>
                                {{ number_format($orderDetails->price/ 1000, 3)}} đ
                                </th>

                            </tr>
                        </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection