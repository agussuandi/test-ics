<nav id="sidebar" class="sidebar">
    <div class="sidebar-content js-simplebar">
        <a class="sidebar-brand" href="{{ url('/') }}">
            <span class="align-middle">Agus | PT. ICS</span>
        </a>
        <ul class="sidebar-nav">
            @if (Auth::user()->is_admin == 1)
            <li class="sidebar-header">
                Main Activity
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/home') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/home') }}">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Home</span>
                </a>
            </li>
            <li class="sidebar-header">
                Master Data
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/master-data/users') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/master-data/users') }}">
                    <i class="align-middle" data-feather="user"></i> <span class="align-middle">Users</span>
                </a>
            </li>
            <li class="sidebar-header">
                Bio Data
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/bio-data') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/bio-data') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Bio Data</span>
                </a>
            </li>
            @else
            <li class="sidebar-header">
                Bio Data
            </li>
            <li class="sidebar-item {{ strpos(Request::url(), '/bio-data') ? 'active' : '' }}">
                <a class="sidebar-link" href="{{ url('/bio-data') }}">
                    <i class="align-middle" data-feather="bar-chart-2"></i> <span class="align-middle">Bio Data</span>
                </a>
            </li>
            @endif
        </ul>
    </div>
</nav>