<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Foodapp's</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="#">About Us</a>
            </li>
            <li class="nav-item">
                <a class="nav-link active" href="/food-cart">Food Cart</a>
            </li>
            <li class="nav-item dropdown">
                @if (Route::has('login'))
                    @auth {{-- If User is Authenticated --}}
                        @if (Auth::user()->user_type == 'ADM') {{-- If the User Authenticated is an admin --}}
                        {{-- Provide Admin links --}}
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account ({{ Auth::user()->name }})
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('admin_dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" style="padding-left:20px; color:#000000;" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true">
                                </i> Logout</a>
                            </li>
                            <form id="logout-form" method="POST" action="{{ route('logout')}}">
                                @csrf
                            </form>
                        </ul>
                        @else
                        {{-- Provide User Links --}}
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            My Account ({{ Auth::user()->name }})
                            </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('user_dashboard') }}">Dashboard</a></li>
                            <li><a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}" style="padding-left:20px; color:#000000;" onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"><i class="fa fa-sign-out" aria-hidden="true">
                                </i> Logout</a>
                            </li>
                            <form id="logout-form" method="POST" action="{{ route('logout')}}">
                                @csrf
                            </form>
                        </ul>
                        @endif
                    @else {{-- If the User is not authenticated at all --}}
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        My Account
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('login') }}">Login</a></li>
                            <li><a class="dropdown-item" href="{{ route('register') }}">Register</a></li>
                        </ul>
                    @endif
                @endif
            </li>
        </ul>
      </div>
    </div>
  </nav>
