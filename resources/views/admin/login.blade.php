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
								<form method="post" action="{{ route('super.login') }}">
                                    @csrf
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Email">
									</div>
									<div class="form-group">
										<input class="form-control" type="text" placeholder="Password">
									</div>
									<div class="form-group">
										<button class="btn btn-primary btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->

								<div class="text-center forgotpass"><a href="forgot-password">Forgot Password?</a></div>
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>

								<!-- Social Login -->
								<div class="social-login">
									<span>Login with</span>
									<a href="#" class="facebook"><i class="fa fa-facebook"></i></a><a href="#" class="google"><i class="fa fa-google"></i></a>
								</div>
								<!-- /Social Login -->

								<div class="text-center dont-have">Don’t have an account? <a href="register">Register</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->

@guest

        <a href="#" data-toggle="modal" data-target="#login-modal">traveler login</a>

@endguest
@auth
    <a href="#">logout</a>
@endauth
@endsection
