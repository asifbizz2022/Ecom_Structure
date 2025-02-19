<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title>Doccure - Register</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/public/admin/
{{ url('/') }}/public/admin/
{{ url('/') }}/public/admin/assets/img/favicon.png">

		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/bootstrap.min.css">
		
		<!-- Fontawesome CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/font-awesome.min.css">
		
		<!-- Main CSS -->
        <link rel="stylesheet" href="{{ url('/') }}/public/admin/assets/css/style.css">
		
		<!--[if lt IE 9]>
			<script src="{{ url('/') }}/public/admin/assets/js/html5shiv.min.js"></script>
			<script src="{{ url('/') }}/public/admin/assets/js/respond.min.js"></script>
		<![endif]-->
    </head>
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper login-body">
            <div class="login-wrapper">
            	<div class="container">
                	<div class="mx-auto w-50">
                    	 
                        <div class="login-right">
							<div class="login-right-wrap">
								<h1>Register</h1>
								@if(Session::has('message'))
								<p class="account-subtitle text-danger text-uppercase"> 
									{{ Session::get('message')}}
								</p> 
								@endif
								
								<!-- Form -->
								<form action="{{ route('admin.register') }}" method="post">
									@csrf
									<div class="form-group">
										<input class="form-control" name="name" type="text" placeholder="Name">
										<small class="text-danger">
											@error('name')
											{{ $message }}
											@enderror
										</small>
									</div>
									<div class="form-group">
										<input class="form-control" name="email" type="email" placeholder="Email">
										<small class="text-danger">
											@error('email')
											{{ $message }}
											@enderror
										</small>
									</div>
									<div class="form-group">
										<input class="form-control" name="password" type="password" placeholder="Password">
										<small class="text-danger">
											@error('password')
											{{ $message }}
											@enderror
										</small>
									</div>
									<div class="form-group">
										<input class="form-control" name="password_confirmation" type="password" placeholder="Confirm Password">
									</div>
									<div class="form-group mb-0">
										<button class="btn btn-primary btn-block" type="submit">Register</button>
									</div>
								</form>
								<!-- /Form -->
								
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								 
								<div class="text-center dont-have">Already have an account? 
									<a href="{{ url('/admin') }}">Login</a></div>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
		<!-- /Main Wrapper -->
		
		<!-- jQuery -->
        <script src="{{ url('/') }}/public/admin/assets/js/jquery-3.2.1.min.js"></script>
		
		<!-- Bootstrap Core JS -->
        <script src="{{ url('/') }}/public/admin/assets/js/popper.min.js"></script>
        <script src="{{ url('/') }}/public/admin/assets/js/bootstrap.min.js"></script>
		
		<!-- Custom JS -->
		<script src="{{ url('/') }}/public/admin/assets/js/script.js"></script>
		
    </body>

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:53 GMT -->
</html>