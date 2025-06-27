@extends('dashboard')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Create Repo
                            <a href="{{ route('repo.list') }}" class="btn btn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="{{ route('repo.postRepo') }}" method="POST">
                                 @csrf
                             
                                 <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" placeholder="Book ID" id="book_id" class="form-control" name="book_id" required
                                        autofocus>
                                    @if ($errors->has('book_id'))
                                    <span class="text-danger">{{ $errors->first('book_id') }}</span>
                                    @endif
                                </div>

                                <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" placeholder="Warehouse ID" id="warehouse_id" class="form-control" name="warehouse_id" required
                                        autofocus>
                                    @if ($errors->has('warehouse_id'))
                                    <span class="text-danger">{{ $errors->first('warehouse_id') }}</span>
                                    @endif
                                </div>

                                 <div data-mdb-input-init class="form-outline form-white mb-4">
                                    <input type="text" placeholder="Quantity" id="quantity" class="form-control" name="quantity" required
                                        autofocus>
                                    @if ($errors->has('quantity'))
                                    <span class="text-danger">{{ $errors->first('quantity') }}</span>
                                    @endif
                                </div>

                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Create</button>

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