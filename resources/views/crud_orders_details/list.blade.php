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
                        <h4>OrdersDetails list
                            <a href="{{ route('orders.createOrderDetails', ['order_id' => request('order_id')])}}"
                                class="btn btn-primary float-end">Add new orderDetail</a>
                            <a href="{{ route('orders.list', ['order_id' => request('order_id')])}}"
                                class="btn btn-danger float-end me-3">Black</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <form action="{{ route('orders.list') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by carrier or status, or tracking number"
                                    value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        <table class="table table-stiped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>order detail id </th>
                                    <th>order Id</th>
                                    <th>Book Id</th>
                                    <th>quantity</th>
                                    <th>price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ordersDetails as $orderDetails)
                                    <tr>
                                        <th>{{ $orderDetails->order_detail_id }}</th>
                                        <th>{{ $orderDetails->order_id}}</th>
                                        <th>{{ $orderDetails->book_id}}</th>
                                        <th>{{ $orderDetails->quantity}}</th>
                                        <th>
                                            {{ number_format($orderDetails->price / 1000, 3)}} đ
                                        </th>

                                        <td class="d-flex gap-3">
                                            <a href="{{ route('orders.updateOrderDetails', ['order_detail_id' => $orderDetails->order_detail_id]) }}"
                                                class="btn btn-success">Edit</a>
                                            <a href="{{ route('orders.readOrderDetails', ['order_detail_id' => $orderDetails->order_detail_id]) }}"
                                                class="btn btn-info">Show</a>

                                             <form id="delete-form-{{ $orderDetails->order_detail_id }}"
                                                action="{{ route('orders.deleteOrderDetails') }}" method="get">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="order_detail_id" value="{{ $orderDetails->order_detail_id }}">
                                                <button type="button" onclick="confirmDelete({{$orderDetails->order_detail_id}})"
                                                    class="btn btn-danger w-100 "><i class="fas fa-trash"></i></button>
                                            </form>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $ordersDetails->links() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(order_detail_id) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa thông tin đơn hàng không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + order_detail_id).submit();
                }
            });
        }
    </script>

@endsection