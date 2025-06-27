@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Chi tiết đánh giá</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <h5>Người dùng</h5>
                            <p>{{ $review->user->full_name }}</p>
                        </div>

                        <div class="mb-3">
                            <h5>Tựa sách</h5>
                        <p>{{ optional($review->book)->title ?? 'N/A' }}</p>
                        </div>

                        <div class="mb-3">
                            <h5>Đánh giá</h5>
                            <div class="rating-display">
                                @for ($i = 1; $i <= 5; $i++)
                                    @if ($i <= $review->rating)
                                        <span class="star filled">★</span>
                                    @else
                                        <span class="star">☆</span>
                                    @endif
                                @endfor
                            </div>
                        </div>

                        <div class="mb-3">
                            <h5>Bình luận</h5>
                            <p>{{ $review->comment ?? 'Không có bình luận' }}</p>
                        </div>

                        <div class="mb-3">
                            <h5>Ngày đánh giá</h5>
                            <p>{{ $review->date_review }}</p>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="{{ route('reviews.edit', $review->id) }}" class="btn btn-primary">Sửa</a>
                            <form action="{{ route('reviews.destroy', $review->id) }}" method="POST" 
                                  onsubmit="return confirm('Bạn có chắc muốn xóa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                            <a href="{{ route('reviews.list') }}" class="btn btn-secondary">Quay lại</a>
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
            font-size: 25px;
        }
        .star.filled {
            color: gold;
        }
    </style>
@endsection