@extends('layout.mainlayout_admin')
@section('content')
    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="https://totallyoutsourcing.vercel.app/_next/static/media/logo.14e4b308.png" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Login</h1>
                            <p class="account-subtitle">Access to our dashboard</p>

                            <!-- Form -->
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group">
                                    <input id="email" class="form-control @error('email') is-invalid @enderror" type="text" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input id="password" class="form-control  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Form -->

{{--                            <div class="text-center forgotpass"><a href="forgot-password">Forgot Password?</a></div>--}}
{{--                            <div class="login-or">--}}
{{--                                <span class="or-line"></span>--}}
{{--                                <span class="span-or">or</span>--}}
{{--                            </div>--}}

                            <!-- Social Login -->
{{--                            <div class="social-login">--}}
{{--                                <span>Login with</span>--}}
{{--                                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>--}}
{{--                            </div>--}}
                            <!-- /Social Login -->

{{--                            <div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->
@endsection
