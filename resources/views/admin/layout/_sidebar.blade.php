<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li> 
					<a href="{{ url('/admin/home') }}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				<li> 
					<a href="{{ url('/admin/books') }}"><i class="fe fe-book"></i> <span>Books</span></a>
				</li>
				<li> 
					<a href="{{ route('admin.logout') }}"><i class="fa fa-sign-out "></i> <span>logout</span></a>
				</li>
				 
				 
				<!-- <li class="submenu">
					<a href="#"><i class="fe fe-document"></i> <span> Books </span> <span class="menu-arrow"></span></a>
					<ul style="display: none;">
						<li><a href="login.html"> Login </a></li>
						<li><a href="register.html"> Register </a></li>
						<li><a href="forgot-password.html"> Forgot Password </a></li>
						<li><a href="lock-screen.html"> Lock Screen </a></li>
					</ul>
				</li> -->
				 
			</ul>
		</div>
    </div>
</div>