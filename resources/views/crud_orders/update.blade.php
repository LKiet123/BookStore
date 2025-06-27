@extends('dashboard')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#cuponSelect').select2({
            dropdownCssClass: 'custom-select2-dropdown'
        });
    });
</script>

<style>
    .select2-results__options {
        max-height: 220px;
        overflow-y: auto;
    }
</style>

@section('content')

    <div class="container">

        <div class="row">

            <div class="col-md-12">

                <div class="card">

                    <div class="card-header">
                        <h4>Add New orders
                            <a href="{{ route('orders.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    </div>

                    <div class="card-body">
                        <form action="{{ route('orders.postUpdateOrder') }}" method="POST">
                            @csrf
                            <input name="order_id" type="hidden" value="{{$order->order_id}}">

                            <div class="form-group mb-3">
                                <label for="user_id">User ID</label>
                                <input type="number" name="user_id" class="form-control" required
                                    value="{{ $order->user_id }}">
                                @error('user_id') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="order_date">Order Date</label>
                                <input type="date" name="order_date" class="form-control" required
                                    value="{{ $order->order_date }}">
                                @error('order_date') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="status">Status</label>
                                <textarea name="status" class="form-control" rows="3"
                                    required>{{$order->status  }}</textarea>
                                @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="tracking_number">Tracking Number</label>
                                <input type="number" name="tracking_number" class="form-control" required
                                    value="{{ $order->tracking_number }}">
                                @error('tracking_number') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="carrier">Carrier</label>
                                <input type="text" name="carrier" class="form-control" required
                                    value="{{ $order->carrier }}">
                                @error('carrier') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="coupon_id">Coupon Code</label>
                                <select name="coupon_id" class="form-control">
                                    <option value="">None</option>
                                    @foreach ($dataCoupons as $coupon)
                                        <option value="{{ $coupon->id }}">
                                            {{ $coupon->coupon_code }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('coupon_id') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Update</button>
                        </form>
                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection