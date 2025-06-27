
@extends('dashboard')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">

            

            <div class="card">
                <div class="card-header">
                    <h4>View Category
                    <a href="{{ route('categories.list') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-stiped table-bordered text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>{{ $category->category_id}}</th>
                                <th>{{ $category->category_name }}</th>
                                <th>{{ $category->category_desc}}</th>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection