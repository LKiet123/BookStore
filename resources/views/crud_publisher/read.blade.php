@extends('dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Publisher Details</h4>
                        <a href="{{ route('publisher.list') }}" class="btn btn-danger btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="mb-4 text-center">
                            <div class="display-6 fw-bold mb-2">{{ $publisher->publisher_name }}</div>
                            <span class="badge bg-secondary fs-6">ID: {{ $publisher->publisher_id }}</span>
                        </div>
                        <div class="mb-3">
                            <h5>Contact Info</h5>
                            <p>{{ $publisher->contact_info ?? '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <h5>Address</h5>
                            <p>{{ $publisher->address ?? '-' }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection