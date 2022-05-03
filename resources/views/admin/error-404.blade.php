@extends('layout.mainlayout_admin')
@section('content')
<!-- Main Wrapper -->
<div class="main-wrapper error-page">

			<div class="error-box">
				<h1>404</h1>
				<h3 class="h2 mb-3"><i class="fa fa-warning"></i> Oops! Page not found!</h3>
				<p class="h4 font-weight-normal">The page you requested was not found.</p>

				<a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn btn-primary">Back to Home</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
			</div>

        </div>
		<!-- /Main Wrapper -->
@endsection
