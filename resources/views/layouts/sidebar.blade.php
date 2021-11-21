<aside class="main-sidebar">
<section class="sidebar">
<div class="d-flex flex-column flex-shrink-0 p-3 bg-light pb-3" style="height:100vh; width: 268px;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"/></svg>
      <span><img src="{{asset('images/twitter_logo.png')}}" alt="Twitter logo"></span>
    </a>
    <br>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="#" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#home"/></svg>
          Home
        </a>
      </li>
      <li>
        <a href="#" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="#speedometer2"/></svg>
          Notifications
        </a>
      </li>

    </ul>
    <hr class="mt-5"> 
    <div class="dropdown pb-3">
      <a href="#" class="d-flex align-items-center link-dark text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="{{asset('images/user.png')}}" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>{{ Auth::user()->name }}</strong>
      </a>
      <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                @guest
                            <li>
                                <a class="dropdown-item" href="{{ route('login') }}">Login</a>
                            </li>
                            @if (Route::has('register'))
                                <li>
                                    <a class="dropdown-item" href="{{ route('register') }}">Sign Up</a>
                                </li>
                            @endif
                        @else
                            <li>
                                <div aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest

      </ul>
    </div>
  </div>
  </section>
</aside>