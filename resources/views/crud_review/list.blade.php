@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                     @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4>List Review</h4>
                            <a href="{{ route('reviews.create') }}" class="btn btn-primary">  <i class="fas fa-user-plus"></i>  </a>
                        </div>
                        
                         <form action="{{ route('reviews.list') }}" method="GET" class="mt-3">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search" 
                                       placeholder="Tìm kiếm theo tên người dùng hoặc tựa sách..."
                                       value="{{ request('search') }}">
                                <button class="btn btn-outline-secondary" type="submit"> <i class="fas fa-search">Tìm kiếm</i></button>
                            </div>
                        </form>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full name</th>
                                        <th>Title</th>
                                        <th>Rating</th>
                                        <th>Comment</th>
                                        <th>Date review</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($reviews as $review)
                                        <tr>
                                            <td>{{ $review->id }}</td>
                                            <td>{{ $review->user->full_name }}</td>
                                             <td>{{ optional($review->book)->title ?? 'N/A' }}</td>

                                            <td>
                                                <div class="rating-display">
                                                    @for ($i = 1; $i <= 5; $i++)
                                                        @if ($i <= $review->rating)
                                                            <span class="star filled">★</span>
                                                        @else
                                                            <span class="star">☆</span>
                                                        @endif
                                                    @endfor
                                                </div>
                                            </td>
                                            <td>{{ $review->comment }} </td>
                                            <td>{{ $review->date_review }}</td>
                                            <td>
                                                <div class="d-flex gap-2">
                                                    <a href="{{ route('reviews.show', $review->id) }}" 
                                                       class="btn btn-info btn-sm "> <i class="fas fa-eye"></i></a>
                                                    <a href="{{ route('reviews.edit', $review->id) }}" 
                                                       class="btn btn-primary btn-sm"> <i class="fas fa-edit"></i></a>
                                                    <form action="{{ route('reviews.destroy', $review->id) }}" 
                                                          method="POST" 
                                                          onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-danger btn-sm"> <i class="fas fa-trash"></i></button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No reviews found</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                       <div class="d-flex justify-content-center align-items-center flex-column">
                            <div class="mb-3 text-muted">
                                Total search results: {{ $reviews->total() }} reviews    
                            </div>
                            {{ $reviews->appends(request()->query())->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rating-display {
            display: flex;
        }
        .star {
            color: #ccc;
            font-size: 20px;
        }
        .star.filled {
            color: gold;
        }
    </style>
@endsection