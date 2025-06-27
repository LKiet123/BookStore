@extends('dashboard')

<!-- Select2 CSS -->
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<!-- jQuery + Select2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function () {
        $('#bookSelect').select2({
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
                        <h4>Add New orders detail
                            <a href="{{ route('orders.listOrderDetailsByOrderId')}}?order_id={{ $order_id }}"
                                class="btn btn-danger float-end">Back</a>
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
                        <form action="{{ route('orders.postOrderDetails') }}" method="POST">
                            @csrf
                            <input type="hidden" name="order_id" class="form-control" value="{{ request('order_id') }}"
                                hidden>
                            <div class="form-group mb-3" class="form-label">
                                <label for="order_id">Order id</label>
                                <input type="number" rows="3" class="form-control" required readonly
                                    value="{{ $order_id }}">
                            </div>

                            <div class="form-group mb-3" class="form-label">
                                <label for="book_id">book name</label>
                                <select name="book_id" id="bookSelect" class="form-control">
                                    @foreach ($dataBooks as $book)
                                        <option value="{{ $book->book_id }}">{{ $book->title }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class="form-group mb-3" class="form-label">
                                <label for="quantity">quantity</label>

                                <input type="number" rows="3" name="quantity" class="form-control" required>
                                @error('quantity')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>



                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Create</button>
                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection