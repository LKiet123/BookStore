@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Book
                            <a href="{{ route('book.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('book.postUpdateBook', ['book_id' => $book->book_id]) }}" method="POST"
                            enctype="multipart/form-data">
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
                            @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <input type="hidden" name="updated_at" value="{{ $book->updated_at }}">
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ $book->title }}" required>
                                @error('title')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="summary" class="form-label">Summary</label>
                                <textarea name="summary" class="form-control" rows="3"
                                    required>{{ $book->summary }}</textarea>
                                @error('summary')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                           

                            <div class="mb-3">
                                <label for="author_id" class="form-label">Author</label>
                                <select name="author_id" class="form-control" required>
                                    <option value="">-- Select Author --</option>
                                    @foreach($authors as $author)
                                        <option value="{{ $author->author_id }}"
                                        {{ $book->author_id == $author->author_id ? 'selected' : '' }}>{{ $author->author_name }}</option>
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
                                        <option value="{{ $publisher->publisher_id }}"
                                        {{ $book->publisher_id == $publisher->publisher_id ? 'selected' : '' }}>{{ $publisher->publisher_name }}</option>
                                    @endforeach
                                </select>
                                @error('publisher_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="published_date" class="form-label">Published Date</label>
                                <input type="date" name="published_date" class="form-control" value="{{ $book->published_date }}" required>
                                @error('published_date')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                 
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" rows="5"
                                    required>{{ $book->description }}</textarea>
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
                                                id="category_{{ $category->category_id }}" value="{{ $category->category_id }}"
                                                {{ $book->categories->contains('category_id', $category->category_id) ? 'checked' : '' }}>
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
                                <input type="number" step="0.01" name="price" class="form-control"
                                    value="{{ $book->price }}" required>
                                @error('price')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" accept="image/*">
                                @if ($book->cover_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $book->cover_image) }}" alt="Cover Image" width="100">
                                    </div>
                                @endif
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="volume_sold" class="form-label">Volume Sold</label>
                                <input type="number" name="volume_sold" class="form-control"
                                    value="{{ $book->volume_sold }}" required>
                                @error('volume_sold')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Update Book</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection