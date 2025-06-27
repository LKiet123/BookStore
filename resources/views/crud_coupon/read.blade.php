@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Coupon Details
                            <a href="{{ route('coupon.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="coupon_code" class="form-label">Coupon Code</label>
                            <p class="form-control">{{ $coupon->coupon_code }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="discount_amount" class="form-label">Discount Amount</label>
                            <p class="form-control">{{ $coupon->discount_amount * 100}}%</p>
                        </div>
                        <div class="mb-3">
                            <label for="valid_from" class="form-label">Valid From</label>
                            <p class="form-control">{{ $coupon->valid_from }}</p>
                        </div>
                        <div class="mb-3">
                            <label for="valid_to" class="form-label">Valid To</label>
                            <p class="form-control">{{ $coupon->valid_to }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection