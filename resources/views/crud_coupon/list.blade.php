@extends('dashboard')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">

        @session('status')
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endsession
        <div class="card">
            <div class="card-header">
                <h4>Coupon List
                    <a href="{{ route('coupon.create') }}" class="btn btn-primary float-end">Add Coupon</a>
                </h4>
            </div>
            <div class="card-body">

                <!-- Search Bar -->
                <form action="{{ route('coupon.list') }}" method="GET" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control"
                            placeholder="Search by Coupon Code, Discount Amount, Valid From, Valid To..."
                            value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>

                <style>
                    .description-cell,
                    .summary-cell {
                        max-width: 200px;
                        /* Set maximum width */
                        max-height: 100px;
                        /* Set maximum height */
                        overflow: auto;
                        /* Enable scrolling for overflow */
                        white-space: pre-wrap;
                        /* Preserve whitespace and wrap text */
                        word-wrap: break-word;
                        /* Break long words */
                    }

                    .action-cell {
                        display: flex;
                        flex-direction: column;
                        gap: 8px;
                        align-items: center;
                        justify-content: center;
                    }

                    .action-cell a,
                    .action-cell button {
                        min-width: 60px;
                        padding: 4px 8px;
                    }
                </style>

                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Coupon Code</th>
                            <th>Discount Amount</th>
                            <th>Valid From</th>
                            <th>Valid To</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($coupons as $coupon)
                            <tr>
                                <td>{{ $coupon->id }}</td>
                                <td>{{ $coupon->coupon_code }}</td>
                                <td>{{ $coupon->discount_amount * 100}}%</td>
                                <td>{{ $coupon->valid_from }}</td>
                                <td>{{ $coupon->valid_to }}</td>
                                <td class="action-cell">
                                    <a href="{{ route('coupon.edit', $coupon->id) }}" class="btn btn-success btn-sm">Edit</a>
                                    <form id="delete-form-{{ $coupon->id }}" action="{{ route('coupon.delete', $coupon->id) }}"
                                        method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm"
                                            onclick="confirmDelete({{ $coupon->id }})">Delete</button>
                                    </form>
                                    <a href="{{ route('coupon.read', ['id' => $coupon->id]) }}"
                                        class="btn btn-info btn-sm">Show</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $coupons->links() }}
                </div>
            </div>

        </div>

    </div>
    <script>
        function confirmDelete(couponId) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa Coupon này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + couponId).submit();
                }
            });
        }
    </script>
@endsection