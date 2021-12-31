<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="/">RITE</a>
        </div>
        <ul class="sidebar-menu">
            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="{{ Request::is('dashboard/posts*') ? 'active' : '' }}">
                <a href="/dashboard/posts" class="nav-link ">
                    <i class="far fa-file"></i>
                    <span>My Posts
                    </span>
                </a>
            </li>
        </ul>

        {{-- Administrator --}}

        {{-- can means only authorize gate can access this --}}
        @can('admin')
            <ul class="sidebar-menu">
                <li class="menu-header">Administrator</li>
                <li class="{{ Request::is('dashboard/categories*') ? 'active' : '' }}">
                    <a href="/dashboard/categories" class="nav-link ">
                        <i class="fas fa-th-large"></i>
                        <span>Post Categories
                        </span>
                    </a>
                </li>
            </ul>
        @endcan
    </aside>
</div>
