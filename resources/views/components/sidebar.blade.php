<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{config('app.name')}}</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @if(request()->routeIs('home')) active @endif">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item ">
        <a class="nav-link @if(!request()->routeIs('users*') || !request()->routeIs('roles*')) collapsed @endif " href="#" data-toggle="collapse" data-target="#collapseTwo"
           aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>{{__('User management')}}</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">

                <div
                    class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">{{__('User management')}}:</h6>
                    <a class="collapse-item @if(request()->routeIs('users*')) active @endif"
                       href="{{route('users.index')}}">{{__('Users')}}</a>
                    @can('role-list')
                    <a class="collapse-item @if(request()->routeIs('roles*')) active @endif"
                       href="{{route('roles.index')}}">{{__('Roles')}}</a>
                    @endcan
                </div>

        </div>
    </li>
    <li class="nav-item">
        <a href="{{ route('logout') }}" class="nav-link"
           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-arrow-alt-circle-left"></i>
            <span>{{ __('Logout') }}</span>
        </a>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
</ul>

