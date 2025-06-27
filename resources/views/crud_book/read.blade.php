@extends('dashboard')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow">
                <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                    <h4 class="mb-0">Book Details</h4>
                    <a href="{{ route('book.list') }}" class="btn btn-danger btn-sm">Back</a>
                </div>
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-md-4 text-center">
                            @if ($book->cover_image)
                                <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image" class="img-fluid rounded shadow" style="max-height: 220px;">
                            @else
                                <img src="{{ asset('images/placeholder.png') }}" alt="No Image" class="img-fluid rounded shadow" style="max-height: 220px;">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3 class="fw-bold">{{ $book->title }}</h3>
                            <p class="mb-1"><strong>Author:</strong> {{ $book->author ? $book->author->author_name : 'Unknown' }}</p>
                            <p class="mb-1"><strong>Publisher:</strong> {{ $book->publisher ? $book->publisher->publisher_name : 'Unknown' }}</p>
                            <p class="mb-1"><strong>Published Date:</strong> {{ $book->published_date }}</p>
                            <p class="mb-1"><strong>Categories:</strong>
                                @if($book->categories && $book->categories->count())
                                    @foreach($book->categories as $category)
                                        <span class="badge bg-primary">{{ $category->category_name }}</span>
                                    @endforeach
                                @else
                                    <span class="text-muted">No categories</span>
                                @endif
                            </p>
                        </div>
                    </div>
                    <hr>
                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $book->description }}</p>
                    </div>
                    <div class="mb-3">
                        <h5>Summary</h5>
                        <p>{{ $book->summary }}</p>
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded shadow-sm text-center">
                                <strong>Price</strong>
                                <div class="fs-5">${{ $book->price }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded shadow-sm text-center">
                                <strong>Volume Sold</strong>
                                <div class="fs-5">{{ $book->volume_sold }}</div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="p-3 bg-light rounded shadow-sm text-center">
                                <strong>ID</strong>
                                <div class="fs-5">{{ $book->book_id }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection