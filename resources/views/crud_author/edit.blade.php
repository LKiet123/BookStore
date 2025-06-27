@extends('dashboard')

@section('content')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Author
                            <a href="{{ route('authors.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form id="update-author-form" action="{{ route('authors.update', $author->author_id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="author_name" class="form-label">Author Name</label>
                                <input type="text" id="author_name" name="author_name" class="form-control"
                                    value="{{ $author->author_name }}" maxlength="255" required>
                                @if ($errors->has('author_name'))
                                    <span class="text-danger">{{ $errors->first('author_name') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Cover Image</label>
                                <input type="file" name="cover_image" class="form-control" accept="image/*">
                                @if ($author->cover_image)
                                    <div class="mt-2">
                                        <img src="{{ asset('images/' . $author->cover_image) }}" alt="Cover Image" width="100">
                                    </div>
                                @endif
                                @error('cover_image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="birth_date" class="form-label">Birth Date</label>
                                <input type="date" id="birth_date" name="birth_date" class="form-control"
                                    value="{{ $author->birth_date }}" maxlength="255" required>
                                @if ($errors->has('birth_date'))
                                    <span class="text-danger">{{ $errors->first('birth_date') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="hometown" class="form-label">Hometown</label>
                                <input type="text" id="hometown" name="hometown" class="form-control"
                                    value="{{ $author->hometown }}" maxlength="255" required>
                                @if ($errors->has('hometown'))
                                    <span class="text-danger">{{ $errors->first('hometown') }}</span>
                                @endif
                            </div>
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio</label>
                                <textarea id="bio" name="bio" class="form-control" rows="4">{{ $author->bio }}</textarea>
                                @if ($errors->has('bio'))
                                    <span class="text-danger">{{ $errors->first('bio') }}</span>
                                @endif
                            </div>

                            <div>
                                <button type="button" class="btn btn-primary" onclick="confirmUpdate()">Update
                                    Author</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function confirmUpdate() {
            Swal.fire({
                title: 'Xác nhận cập nhật',
                text: 'Bạn có chắc chắn muốn cập nhật thông tin tác giả này?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Cập nhật',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('update-author-form').submit();
                }
            });
        }
    </script>
@endsection