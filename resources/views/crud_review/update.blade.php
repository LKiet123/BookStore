@extends('dashboard')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h4>Cập nhật đánh giá</h4>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Lỗi!</strong> Vui lòng kiểm tra lại thông tin.<br><br>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="user_id" class="form-label">Người dùng</label>
                                <select class="form-control" id="user_id" name="user_id" required>
                                    <option value="">Chọn người dùng</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" 
                                            {{ old('user_id', $review->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->full_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="book_id" class="form-label">Sách</label>
                                <select class="form-control" id="book_id" name="book_id" required>
                                    <option value="">Chọn sách</option>
                                    @foreach($books as $book)
                                        <option value="{{ $book->book_id }}" 
                                            {{$review->book_id == $book->book_id ? 'selected' : '' }}>
                                            {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Đánh giá</label>
                                <div class="rating">
                                    @for($i = 5; $i >= 1; $i--)
                                        <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" 
                                            {{ old('rating', $review->rating) == $i ? 'checked' : '' }}/>
                                        <label for="star{{ $i }}"></label>
                                    @endfor
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="comment" class="form-label">Bình luận</label>
                                <textarea class="form-control" id="comment" name="comment" rows="4">{{ old('comment', $review->comment) }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="date_review" class="form-label">Ngày đánh giá</label>
                                <input type="date" class="form-control" id="date_review" name="date_review" 
                                    value="{{ old('date_review', $review->date_review) }}" required>
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Cập nhật</button>
                                <a href="{{ route('reviews.list') }}" class="btn btn-secondary">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .rating {
            display: flex;
            flex-direction: row-reverse;
            justify-content: flex-end;
        }
        .rating input {
            display: none;
        }
        .rating label {
            cursor: pointer;
            width: 30px;
            height: 30px;
            margin: 0 5px;
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="white" stroke="black" stroke-width="1"/></svg>');
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
        }
        .rating label:hover,
        .rating label:hover ~ label,
        .rating input:checked ~ label {
            background-image: url('data:image/svg+xml;charset=UTF-8,<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 .587l3.668 7.568 8.332 1.151-6.064 5.828 1.48 8.279-7.416-3.967-7.417 3.967 1.481-8.279-6.064-5.828 8.332-1.151z" fill="gold"/></svg>');
        }
    </style>
@endsection