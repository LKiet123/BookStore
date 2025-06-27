@extends('dashboard')

@section('content')
    <div class="container mt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card shadow">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Author Details</h4>
                        <a href="{{ route('authors.list') }}" class="btn btn-danger btn-sm">Back</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                @if ($author->cover_image)
                                    <img src="{{ asset('images/' . $author->cover_image) }}" alt="Cover Image"
                                        class="img-fluid rounded shadow" style="max-height: 220px;">
                                @else
                                    <img src="{{ asset('images/placeholder.png') }}" alt="No Image"
                                        class="img-fluid rounded shadow" style="max-height: 220px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h3 class="fw-bold">{{ $author->title }}</h3>
                                <p class="mb-1"><strong>Author:</strong>
                                    {{ $author->author_name ? $author->author_name : 'Unknown' }}</p>
                                <p class="mb-1"><strong>Birth Date:</strong>
                                    {{ $author->birth_date ? $author->birth_date : 'Unknown' }}</p>
                                <p class="mb-1"><strong>Hometown:</strong>
                                    {{ $author->hometown ? $author->hometown : 'Unknown' }}</p>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <h5>Bio</h5>
                            <p>{{ $author->bio }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection