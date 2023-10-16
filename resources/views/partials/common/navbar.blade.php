<nav class="navbar navbar-expand-lg navbar-dark bg-dark" >
    <div class="navbar-container container d-flex">
        <a class="navbar-brand justify-content-center col-2" href="/" style="font-weight: bolder; font-size: xx-large;">Discussly</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-10" id="navbarSupportedContent">
            <form class="d-flex justify-content-center align-items-center col-lg-6 col-8 my-lg-0 my-2" action="/search" method="GET">
                <input class="form-control" type="search" placeholder="Search" name="text_search" aria-label="Search" style="border-top-right-radius: 0%; border-bottom-right-radius: 0%;">
                <button id="search_btn" class="btn btn-outline-light" type="submit" style="border-color: #fd5d22; background-color:#fd5d22; border-width: 0.10rem; border-top-left-radius: 0%; border-bottom-left-radius: 0%;">
                    <span class="material-icons d-flex justify-content-center">
                        search
                    </span>
                </button>
            </form>
            <div class="navbar-spaces col-lg-3">
                <li class="nav-item dropdown d-none d-lg-flex justify-content-center align-items-center mx-auto col-4">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                      Spaces
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/science">Science</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/technology">Technology</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/engineering">Engineering</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li><a class="dropdown-item" href="/maths">Maths</a></li>
                    </ul>
                </li>
                <ul class="navbar-nav me-auto d-lg-none">
                    <li class="nav-item col-3">
                        <a class="nav-link" style="color: white;" href="/science">Science</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link" style="color: white;" href="/technology">Technology</a>
                    </li>
                    <li class="nav-item col-4">
                        <a class="nav-link" style="color: white;" href="/engineering">Engineering</a>
                    </li>
                    <li class="nav-item col-3">
                        <a class="nav-link" style="color: white;" href="/maths">Maths</a>
                    </li>
                </ul>
            </div>
            @guest
            <div class="d-flex justify-content-lg-end col-lg-3 mt-lg-0 mt-3">
                <button type="button" id="login_btn" class="btn btn-outline me-3" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap" style="color: #fd5d22; border-color: #fd5d22; background-color: #212529;">Login</button>
                @include('auth.partials.login_modal')
                <button onclick="location.href='/signup'" class="btn btn-primary" type="button" style="background-color: #fd5d22; border-color: #fd5d22;">Sign Up</button>
            </div>

            @endguest
            @auth
                <div class="dropdown d-flex justify-content-lg-end col-lg-3 mt-lg-0 mt-3">
                    <button class="btn btn-secondary dropdown-toggle me-2" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                    @if (file_exists(public_path('images/userProfile/' . Auth::user()->user_id . '.jpg')))
                        <img src="{{'../../images/userProfile/' . Auth::user()->user_id . '.jpg'}}" class="rounded-circle" width="40">
                    @else
                        <img src="{{'../../images/userProfile/null.jpg'}}" class="rounded-circle" width="40">
                    @endif
                        {{Auth::user()->username}}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-lg-end me-2" style="" aria-labelledby="dropdownMenuButton2">
                    <li>
                        <a class="dropdown-item d-flex" href="/users/{{Auth::id()}}">
                            <span class="material-icons me-2">
                            person
                            </span>
                            Profile
                        </a>
                    </li>
                    @if (Auth::user()->isAdmin())
                        <li>
                            <a class="dropdown-item d-flex" href="/admin">
                        <span class="material-icons me-2">
                            admin_panel_settings
                        </span>
                                Administrate
                            </a>
                        </li>
                    @endif

                    <li>
                        <a class="dropdown-item d-flex" href="{{route('logout')}}">
                            <span class="material-icons me-1">
                            logout
                            </span>
                            Logout
                        </a>
                    </li>
                    </ul>
                </div>
            @endauth
        </div>
    </div>
</nav>

