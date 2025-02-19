<!DOCTYPE html>
<html lang="en">
    
@include('admin.layout._header-links')
    <body>
	
		<!-- Main Wrapper -->
        <div class="main-wrapper">
		
			<!-- Header -->
        	@include('admin.layout._header')
			<!-- /Header -->
			
			<!-- Sidebar -->
         	@include('admin.layout._sidebar')
			<!-- /Sidebar -->
			
			<!-- Page Wrapper -->
            <div class="page-wrapper">
                <div class="content container-fluid"> 
					<!-- Page Header -->
					<div class="page-header">
						<div class="row">
							<div class="col-sm-12">
								<h5 class="page-title">@yield('title', 'No title')</h5>
								<!-- <ul class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
									<li class="breadcrumb-item active">Blank Page</li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /Page Header -->
					
					<div class="row">
						<div class="col-sm-12">
							@yield('content')
						</div>			
					</div>
					
				</div>			
			</div>
			<!-- /Page Wrapper -->
		
        </div>
		<!-- /Main Wrapper -->
		
		@include('admin.layout._scripts')
		@yield('js')
		
    </body>

 
</html>