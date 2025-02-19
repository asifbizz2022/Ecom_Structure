 <nav class="navbar navbar-expand-lg navbar-light bg-light border">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">Home</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    
                    @if(Auth::guard('client')->check())
                    <li class="nav-item">
                        <a class="btn btn-outline-info" href="{{ route('client.logout') }}">{{Auth::guard('client')->user()->name }} Logout</a>
                    </li>
                    @else 
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('client/login/page') }}">Login</a>
                    </li>
                    @endif
               
                </ul>
              
            </div>
        </div>
    </nav>
    @if(Session::has("message"))
    <div class="alert alert-info">
        {{Session::get('message')}}
    </div>
    @endif
