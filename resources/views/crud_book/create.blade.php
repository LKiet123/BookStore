@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create New Book
                            <a href="{{ route('book.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.postBook') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary</label>
                                <textarea name="summary" class="form-control" rows="3" maxlength="500" required></textarea>
                                @error('summary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="author_id" class="form-label">Author</label>
                                <select name="author_id" class="form-control" required>
                                    <option value="">-- Select Author --</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}">{{ $author->author_name }}</option>
                                    @endforeach
                                </select>
                                @error('author_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="publisher_id" class="form-label">Publisher</label>
                                <select name="publisher_id" class="form-control" required>
                                    <option value="">-- Select Publisher --</option>
                                    @foreach($publishers as $publisher)
                                        <option value="{{ $publisher->publisher_id }}">{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                </select>
                                @error('publisher_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="published_date" class="form-label">Published Date</label>
                                <input type="date" name="published_date" class="form-control" required>
                                @error('published_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5" maxlength="255"
                                    required></textarea>
                                @error('description')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Categories</label>
                                <div>
                                    @foreach($categories as $category)
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" name="categories[]"
                                                id="category_{{ $category->category_id }}" value="{{ $category->category_id }}">
                                            <label class="form-check-label" for="category_{{ $category->category_id }}">
                                                {{ $category->category_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                                @error('categories')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" step="0.01" name="price" class="form-control" required maxlength="10">
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" accept="image/*">
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="volume_sold" class="form-label">Volume Sold</label>
                                <input type="number" name="volume_sold" class="form-control" required>
                                @error('volume_sold')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Create Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function (e) {
                    const btn = form.querySelector('button[type="submit"]');
                    if (btn) {
                        btn.disabled = true;
                        btn.innerText = 'Submitting...';
                    }
                });
            }
        });
    </script>
@endsection