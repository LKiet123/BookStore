{{--@extends('dashboard')--}}

{{--@section('content')--}}
{{--<section class="vh-50 gradient-custom">--}}
{{--    <div class="container py-5 h-50">--}}
{{--        <div class="row d-flex justify-content-center align-items-center h-50">--}}
{{--            <div class="col-12 col-md-8 col-lg-6 col-xl-5">--}}
{{--                <div class="card  text-white" style="border-radius: 1rem;">--}}
{{--                    <div class="card-body p-5 text-center">--}}

{{--                        <div class="mb-md-5 mt-md-4 pb-5">--}}
{{--                            <form method="POST" action="{{ route('user.authUser') }}">--}}
{{--                                @csrf--}}
{{--                                <h2 class="fw-bold mb-2 text-uppercase" style="color: black;">Login</h2>--}}
{{--                                <p class="text-white-50 mb-5">Please enter your login and password!</p>--}}

{{--                                <div data-mdb-input-init class="form-outline form-white mb-4">--}}
{{--                                    <input type="text" placeholder="Email" id="email" class="form-control" name="email" required--}}
{{--                                        autofocus>--}}
{{--                                    @if ($errors->has('email'))--}}
{{--                                    <span class="text-danger">{{ $errors->first('email') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <div data-mdb-input-init class="form-outline form-white mb-4">--}}
{{--                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>--}}
{{--                                    @if ($errors->has('password'))--}}
{{--                                        <span class="text-danger">{{ $errors->first('password') }}</span>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                                <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>--}}

{{--                                <button data-mdb-button-init data-mdb-ripple-init class="btn btn-dark btn-outline-light btn-lg px-5" type="submit">Login</button>--}}

{{--                                <div class="d-flex justify-content-center text-center mt-4 pt-1">--}}
{{--                                    <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>--}}
{{--                                    <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>--}}
{{--                                    <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}



{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
{{--@endsection--}}
