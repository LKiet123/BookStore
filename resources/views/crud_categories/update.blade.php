@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Update Category
                            <a href="{{ route('categories.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.postUpdateCategory') }}" method="POST">
                            @csrf

                            <input name="category_id" type="hidden" value="{{$category->category_id}}">
                            <div class="form-group mb-3">
                                <input type="text" name="category_name" value="{{ $category->category_name}}"
                                    class="form-control">
                                @error('category_name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror

                            </div>

                            <div class="form-group mb-3">
                                <textarea name="category_desc" class="form-control">{{ $category->category_desc }}</textarea>
                                @error('category_desc')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button data-mdb-button-init data-mdb-ripple-init
                                class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Update</button>

                            <div class="d-flex justify-content-center text-center mt-4 pt-1">
                                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection