<div class="col-2 col-sm-3 col-lg-2 bg-dark">
    <div class="d-flex flex-column justify-content-center align-items-center">
        <ul class="nav flex-column">
            <li class="nav-item {{ Request::segment(2) === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link btn text-white" role="button" href="{{ route('account.dashboard') }}">Dashboard</a>
            </li>
            <?php
            $userManagementIsActive = Request::segment(2) === 'user-list' || Request::segment(2) === 'add-user';
            ?>
            <li class="nav-item">
                <a href="#submenu1" class="nav-link btn text-white" data-bs-toggle="collapse" role="button"
                    aria-expanded="{{ $userManagementIsActive ? 'true' : 'false' }}" aria-controls="submenu1">User
                    Management</a>
                <ul class="collapse nav flex-column {{ $userManagementIsActive ? 'show' : '' }}" id="submenu1">
                    {{-- here w-100 is used to solve a problem where the opening menu was collapsing horizontally then vertically --}}
                    <li class='w-100 {{ Request::segment(2) === 'user-list' ? 'active' : '' }}'>
                        <a href="{{ route('account.userList') }}" class="nav-link btn text-white" role="button"> User
                            List </a>
                    </li>
                    <li class='{{ Request::segment(2) === 'add-user' ? 'active' : '' }}'>
                        <a href="{{ route('account.addUser') }}" class="nav-link btn text-white" role="button"> Add
                            User </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
