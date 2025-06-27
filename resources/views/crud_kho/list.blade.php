@extends('dashboard')

@section('content')



@session('status')
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endsession

<div class="card">
    <div class="card-header">
        <h4>Repo List
            <a href="{{ route('repo.createRepo') }}" class="btn btn-primary float-end">Add Repo</a>
        </h4>
    </div>
    <div class="card-body">

        <form action="{{ route('repo.list') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" name="search" class="form-control"
                    placeholder="Search by book name" value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary">Search</button>
            </div>
        </form>
        <table class="table table-stiped table-bordered text-center">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Book Id</th>
                    <th>Warehouse Id</th>
                    <th>Quantity</th>
                    <th>warehouse Location</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($repos as $repo)
                <tr>
                    <th>{{ $repo->id }}</th>
                    <th>{{ $repo->book_id }}</th>
                    <th>{{ $repo->warehouse_id}}</th>

                    <th>{{ $repo->quantity}}</th>
                    <th>{{ $repo->repo->warehouseLocation}}</th>

                    <td>
                        <a href="{{ route('repo.updateRepo', ['id' => $repo->id]) }}" class="btn btn-success">Edit</a>
                        <a href="{{ route('repo.readRepo', ['id' => $repo->id]) }}" class="btn btn-info">Show</a>
                        <a href="{{ route('repo.deleteRepo', ['id' => $repo->id]) }}" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
        {{$repos->links()}}


        @endsection