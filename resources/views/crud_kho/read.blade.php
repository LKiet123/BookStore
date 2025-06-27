@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">



            <div class="card">
                <div class="card-header">
                    <h4>Read Repo
                        <a href="{{ route('repo.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Book Id</th>
                                <th>Warehouse Id</th>
                                <th>Quantity</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                 <th>{{ $messi->id }}</th>
                                <th>{{ $messi->book_id }}</th>
                                <th>{{ $messi->warehouse_id }}</th>
                                <th>{{ $messi->quantity }}</th>
                               

                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection