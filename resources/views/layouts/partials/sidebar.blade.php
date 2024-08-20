@php
    $routeArray = app('request')->route()->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    [$controller, $action] = explode('@', $controllerAction);
@endphp

<div class="d-flex flex-column justify-content-center align-items-center">
    <ul class="nav flex-column">
        <li class="nav-item {{ $controller == 'DashboardController' && in_array($action, ['index']) ? 'active' : '' }}">
            <a class="nav-link btn text-white" role="button" href="{{ route('account.dashboard') }}">Dashboard</a>
        </li>
        <?php
        $userManagementIsActive = Request::segment(2) === 'user-list' || Request::segment(2) === 'add-user';
        ?>
        <li class="nav-item">
            <a href="#submenu1" class="nav-link btn text-white" data-bs-toggle="collapse" role="button"
                aria-expanded="{{ $controller == 'UsersController' ? 'true' : 'false' }}" aria-controls="submenu1">User
                Management</a>
            <ul class="collapse nav flex-column {{ $controller == 'UsersController' ? 'show' : '' }}" id="submenu1">
                {{-- here w-100 is used to solve a problem where the opening menu was collapsing horizontally then vertically --}}
                <li
                    class='w-100 {{ $controller == 'UsersController' && in_array($action, ['userList']) ? 'active' : '' }}'>
                    <a href="{{ route('account.userList') }}" class="nav-link btn text-white" role="button"> User
                        List </a>
                </li>
                <li class='{{ $controller == 'UsersController' && in_array($action, ['addUser']) ? 'active' : '' }}'>
                    <a href="{{ route('account.addUser') }}" class="nav-link btn text-white" role="button"> Add
                        User </a>
                </li>
            </ul>
        </li>
    </ul>
</div>
