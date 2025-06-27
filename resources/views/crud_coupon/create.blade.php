@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create coupon
                            <a href="{{ route('coupon.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="coupon_code">Coupon Code</label>
                                <input type="text" id="coupon_code" name="coupon_code" class="form-control"
                                    value="{{ old('coupon_code') }}" maxlength="20" required>
                                @if ($errors->has('coupon_code'))
                                    <span class="text-danger">{{ $errors->first('coupon_code') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="discount_amount">Discount Amount</label>
                                <input type="number" id="discount_amount" name="discount_amount" class="form-control"
                                    value="{{ old('discount_amount') }}" step="0.01" required>
                                @if ($errors->has('discount_amount'))
                                    <span class="text-danger">{{ $errors->first('discount_amount') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="valid_from">Valid From</label>
                                <input type="date" id="valid_from" name="valid_from" class="form-control"
                                    value="{{ old('valid_from') }}" required>
                                @if ($errors->has('valid_from'))
                                    <span class="text-danger">{{ $errors->first('valid_from') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="valid_to">Valid To</label>
                                <input type="date" id="valid_to" name="valid_to" class="form-control"
                                    value="{{ old('valid_to') }}" required>
                                @if ($errors->has('valid_to'))
                                    <span class="text-danger">{{ $errors->first('valid_to') }}</span>
                                @endif
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Create Coupon</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection