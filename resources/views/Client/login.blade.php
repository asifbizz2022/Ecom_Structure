<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <title> Login</title>
		
		<!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/epublic/admin/assets/img/favicon.png">

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
        <div class="main-wrapper login-body bg-white">
            <div class="login-wrapper "> 
            	<div class="   py-5  ">
            		<div class="text-center h3 mb-5">Login</div>
                	<div class="w-25 mx-auto  "> 
                        <div class="login-right">
							<div class="login-right-wrap">
								 

								@if(Session::has('message'))
								<p class="account-subtitle text-danger text-uppercase"> 
									{{ Session::get('message')}}
								</p> 
								@endif
								
								
								<!-- Form -->
								<form action="{{ route('client.login') }}" method="post">@csrf
									<div class="form-group">
										<input class="form-control" name="email" value="{{ old('email') }}" type="email" placeholder="Email">
										<small class="text-danger font-weight-bold">
											@error('email')
											{{$message}}
											@enderror
										</small>
									</div>
									<div class="form-group">
										<input class="form-control" name="password" type="password" placeholder="Password">
										<small class="text-danger font-weight-bold">
											@error('password')
											{{$message}}
											@enderror
										</small>
									</div>
									<div class="form-group">
										<button class="btn btn-danger btn-block" type="submit">Login</button>
									</div>
								</form>
								<!-- /Form -->
								
								<!-- <div class="text-center"><a href="forgot-password.html" class="text-info">Forgot Password</a></div> -->
								<div class="login-or">
									<span class="or-line"></span>
									<span class="span-or">or</span>
								</div>
								 
								<div class="text-center dont-have">Don’t have an account ? <a href="#" class="text-info">Register</a></div>
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

<!-- Mirrored from dreamguys.co.in/demo/doccure/admin/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 30 Nov 2019 04:12:46 GMT -->
</html>