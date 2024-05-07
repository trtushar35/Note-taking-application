<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3 sidebar-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{route('profile.view')}}">
                    <span data-feather="home" class="align-text-bottom"></span>
                    Profile | {{auth()->user()->name}}
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('note.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Notes
                </a>
            </li>
            @if (auth()->user()->role=='admin')
            <li class="nav-item">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('users.list')}}">
                    <span data-feather="file" class="align-text-bottom"></span>
                    Users List
                </a>
            </li>          
            @endif
        </ul>
    </div>
</nav>