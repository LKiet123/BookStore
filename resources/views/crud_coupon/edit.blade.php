@extends('dashboard')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Coupon
                            <a href="{{ route('coupon.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="update-coupon-form" action="{{ route('coupon.update', $coupon->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="coupon_code" class="form-label">Coupon Code</label>
                                <input type="text" id="coupon_code" name="coupon_code" class="form-control"
                                    value="{{ $coupon->coupon_code }}" maxlength="20" required>
                                @if ($errors->has('coupon_code'))
                                    <span class="text-danger">{{ $errors->first('coupon_code') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="discount_amount" class="form-label">Discount Amount</label>
                                <input type="number" id="discount_amount" name="discount_amount" class="form-control"
                                    value="{{ $coupon->discount_amount }}" step="0.01" required>
                                @if ($errors->has('discount_amount'))
                                    <span class="text-danger">{{ $errors->first('discount_amount') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="valid_from" class="form-label">Valid From</label>
                                <input type="date" id="valid_from" name="valid_from" class="form-control"
                                    value="{{ $coupon->valid_from }}" required>
                                @if ($errors->has('valid_from'))
                                    <span class="text-danger">{{ $errors->first('valid_from') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="valid_to" class="form-label">Valid To</label>
                                <input type="date" id="valid_to" name="valid_to" class="form-control"
                                    value="{{ $coupon->valid_to }}" required>
                                @if ($errors->has('valid_to'))
                                    <span class="text-danger">{{ $errors->first('valid_to') }}</span>
                                @endif
                            </div>
                            <div>
                                <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update
                                    Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmUpdate() {
            Swal.fire({
                title: 'Xác nhận cập nhật',
                text: 'Bạn có chắc chắn muốn cập nhật thông tin Coupon này?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Cập nhật',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-coupon-form').submit();
                }
            });
        }
    </script>
@endsection