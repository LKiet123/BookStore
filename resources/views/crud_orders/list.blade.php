@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @session('status')
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endsession

                <div class="card">
                    <div class="card-header">
                        <h4>Orders list
                            <a href="{{ route('orders.createOrder') }}" class="btn btn-primary float-end">Add new order</a>
                        </h4>
                    </div>
                    <div class="card-body table-responsive  ">

                        <form action="{{ route('orders.list') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by carrier or status, or tracking number"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        <table class="table table-stiped table-bordered text-center w-100 ">
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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <th>{{ $order->order_id }}</th>
                                        <th>{{ $order->user_id}}</th>
                                        <th>{{ $order->order_date}}</th>
                                        <th>{{ $order->status}}</th>
                                        <th>{{ $order->tracking_number}}</th>
                                        <th>{{ $order->carrier}}</th>
                                        <th>{{ $order->coupon_id}}</th>
                                        <th>{{ number_format($order->total_price / 1000, 3)}} đ</th>

                                        <td class="d-flex gap-2">
                                            <a href="{{ route('orders.updateOrder', ['order_id' => $order->order_id]) }}"
                                                class="btn btn-success" style="height:30%">Edit</a>
                                            <a href="{{ route('orders.readOrder', ['order_id' => $order->order_id]) }}"
                                                class="btn btn-info" style="height:30%">Show</a>
                                           

                                            <form id="delete-form-{{ $order->order_id }}"
                                                action="{{ route('orders.deleteOrder') }}" method="get">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="category_id" value="{{ $order->order_id }}">
                                                <button type="button" onclick="confirmDelete({{$order->order_id}})"
                                                    class="btn btn-danger "><i class="fas fa-trash"></i></button>
                                            </form>

                                            <a href="{{ route('orders.listOrderDetailsByOrderId', ['order_id' => $order->order_id]) }}"
                                                class="btn btn-info " style="">details</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $orders->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmDelete(order_id) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa đơn hàng này này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + order_id).submit();
                }
            });
        }
    </script>

@endsection