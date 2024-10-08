<nav class="navbar navbar-expand-md bg-white shadow-lg fixed-top" style="z-index: 1031">
    <div class="container">
        <a class="navbar-brand" href="{{ route('account.dashboard') }}">
            <strong>Laravel 11 Multi Auth
                @if (Auth::guard('admin')->check())
                    Admin
                @endif
            </strong>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar"
            aria-controls="offcanvasNavbar">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-list"
                viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z" />
            </svg>
        </button>
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1">

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#!" id="accountDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Hello,
                            @if (Auth::guard('admin')->check())
                                {{ Auth::guard('admin')->user()->name }}
                            @elseif (Auth::guard('web')->check())
                                {{ Auth::guard('web')->user()->name }}
                            @else
                                Guest
                            @endif
                        </a>
                        <ul class="dropdown-menu border-0 shadow bsb-zoomIn" aria-labelledby="accountDropdown">
                            <li>
                                <a class="dropdown-item"
                                    href="
                                    @if (Auth::guard('web')->check()) {{ route('account.logout') }}
                                    @elseif (Auth::guard('admin')->check()) {{ route('admin.logout') }} 
                                    @else # @endif
                                 ">Logout</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>
