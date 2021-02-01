<nav class="navbar navbar-expand-lg navbar-light navColor boxShadow ">
    <div class="container-fluid py-2">
      <a class="navbar-brand text-white" href="{{ route('home') }}">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Right Nav -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            @auth
            <li class="nav-item mx-2">
                <a class="nav-link text-white" href="{{ route('assignment',auth()->user()) }}">Upload Assignments</a>
            </li>
            @endauth

            <form class="d-flex" action="{{ route('search') }}" method="GET">
                <input class="form-control me-2" type="search" name="search"  placeholder="Search">
                <button class="btn btn-outline-primary text-white" type="submit">Search</button>
            </form>
        </ul>

        <div class="d-flex flex-row-reverse bd-highlight">
            <ul class=" navbar-nav me-auto mb-2 mb-lg-0 p-2 bd-highlight">
                @auth
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-capitalize text-white" href="{{ route('profile',auth()->user()) }}">{{ auth()->user()->username }}</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-2 text-capitalize text-white" href="#">Faculty of {{ auth()->user()->faculty }}</a>
                    </li>

                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="nav-link mx-2 trans border border-0 text-capitalize text-white" href="{{ route('logout') }}">logout</button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-capitalize text-white" href="{{ route('login') }}">login</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link mx-2 text-white" href="{{ route('register') }}">Register</a>
                    </li>
                @endguest
            </ul>
        </div>

      </div>
    </div>
  </nav>
