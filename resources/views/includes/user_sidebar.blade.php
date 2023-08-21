{{-- @include('layouts.menu') --}}
<li class="app-sidebar__heading">{{ __('Welcome To The Admin Panel') }}</li>
<li class="">
    <a href="{{ route('user.dashboard') }}"
        class="{{ request()->route()->getName() == 'user.dashboard'? 'mm-active': '' }}">
        <i class="metismenu-icon pe-7s-box2"></i>
        {{ __('Dashboard') }}
    </a>
</li>
<li class="app-sidebar__heading">{{ __('Application  MENU') }}</li>
<li class="">
    <a href="#"
        class="{{ Request::is(config('admin.admin_route_prefix') . '/users**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-users"></i>
        {{ __('Users') }}
    </a>
</li>



<li class="">
    <a href="{{ route('logout') }}"
        onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        <i class="metismenu-icon pe-7s-back"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
