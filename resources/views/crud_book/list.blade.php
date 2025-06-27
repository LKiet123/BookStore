@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">

                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>Book List
                            <a href="{{ route('book.createBook') }}" class="btn btn-primary float-end">Add Book</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <!-- Search Bar -->
                        <form action="{{ route('book.list') }}" method="GET" class="mb-3">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control"
                                    placeholder="Search by title, author, or category" value="{{ request('search') }}">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </form>

                        <style>
                            .description-cell,
                            .summary-cell,
                            .title-cell {
                                max-width: 200px;
                                /* Set maximum width */
                                max-height: 100px;
                                /* Set maximum height */
                                overflow: auto;
                                /* Enable scrolling for overflow */
                                white-space: pre-wrap;
                                /* Preserve whitespace and wrap text */
                                word-wrap: break-word;
                                /* Break long words */
                            }

                            .action-cell {
                                display: flex;
                                flex-direction: column;
                                /* Display icons in a row */
                                justify-content: center;
                                /* Center align the icons */
                                gap: 10px;
                                /* Add gap between icons */
                            }

                            .action-cell a {
                                display: inline-flex;
                                align-items: center;
                                justify-content: center;
                                text-decoration: none;
                                /* Remove underline from links */
                            }
                        </style>

                        <table class="table table-stiped table-bordered text-center">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th>Author</th>
                                    <th>Published Date</th>
                                    <th>Category</th>
                                    <th>Publisher</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Price</th>
                                    <th>Summary</th>
                                    <th>Volume Sold</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($books as $book)
                                    <tr>
                                        <th class="title-cell">{{ $book->title }}</th>
                                        <th>{{ $book->author ? $book->author->author_name : 'Unknown' }}</th>
                                        <th>{{ $book->published_date }}</th>
                                        <th style="max-width: 120px">@foreach ($book->categories as $category)
                                            <span class="badge bg-primary">{{ $category->category_name }}</span>
                                        @endforeach

                                        </th>
                                        <th>{{ $book->publisher ? $book->publisher->publisher_name :'Unknown' }}</th>
                                        <td class="description-cell">{{ $book->description }}</td>
                                        <td>
                                            @php
                                                $imagePath = public_path('uploads/' . $book->cover_image);
                                            @endphp
                                            @if ($book->cover_image && file_exists($imagePath))
                                                <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image"
                                                    class="img-fluid rounded shadow" style="max-height: 220px;">
                                            @else
                                                <img src="{{ asset('images/placeholder.png') }}" alt="No Image"
                                                    class="img-fluid rounded shadow" style="max-height: 220px;">
                                            @endif
                                        </td>
                                        <th>{{ $book->price }}</th>
                                        <td class="summary-cell">{{ $book->summary }}</td>
                                        <th>{{ $book->volume_sold }}</th>
                                        <td class="action-cell">
                                            <a href="{{ route('book.updateBook', ['book_id' => $book->book_id]) }}"
                                                class="btn btn-success">
                                                <i class="fas fa-edit"></i> <!-- Edit Icon -->
                                            </a>
                                            <a href="{{ route('book.readBook', ['book_id' => $book->book_id]) }}"
                                                class="btn btn-info">
                                                <i class="fas fa-eye"></i> <!-- Show Icon -->
                                            </a>
                                            <form id="delete-form-{{ $book->book_id }}" action="{{ route('book.deleteBook') }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="book_id" value="{{ $book->book_id }}">
                                                <button type="button" onclick="confirmDelete({{ $book->book_id }})"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="d-flex justify-content-center">
                            {{ $books->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(bookId) {
            Swal.fire({
                title: 'Xác nhận xóa',
                text: 'Bạn có chắc chắn muốn xóa quyển sách này không?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + bookId).submit();
                }
            });
        }
    </script>

@endsection