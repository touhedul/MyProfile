{{-- @include('layouts.menu') --}}
<li class="app-sidebar__heading">{{ __('Welcome To The Admin Panel') }}</li>
{{-- Dashboard --}}
@can('dashboard-view')
    <li class="">
        <a href="{{ route('admin.dashboard') }}"
            class="{{ request()->route()->getName() == 'admin.dashboard' ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-box2"></i>
            {{ __('Dashboard') }}
        </a>
    </li>
@endcan
<li class="app-sidebar__heading">{{ __('Application  MENU') }}</li>
{{-- Users --}}
@can('user-view')
    @if (Route::has('admin.users.index'))
        <li class="">
            <a href="{{ route('admin.users.index') }}"
                class="{{ Request::is(config('admin.admin_route_prefix') . '/users**') ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-users"></i>
                {{ __('Users') }}
            </a>
        </li>
    @endif
@endcan


@can('Menu-management')
    <li class="">
        <a href="{{ route('admin.menuManagement.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/menu-management**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-menu"></i>
            {{ __('Menu') }}
        </a>
    </li>
@endcan
@can('Home-management')
    <li class="">
        <a href="{{ route('admin.homeManagement.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/home-management**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-home"></i>
            {{ __('Home') }}
        </a>
    </li>
@endcan
@can('About-management')
    <li class="">
        <a href="{{ route('admin.aboutManagement.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/about-management**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-id"></i>
            {{ __('About') }}
        </a>
    </li>
@endcan


@can('Skill-view')
    <li class="">
        <a href="{{ route('admin.skills.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/skills**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-tools"></i>
            {{ __('Skill') }}
        </a>
    </li>
@endcan


@can('Service-view')
    <li class="">
        <a href="{{ route('admin.services.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/services**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-helm"></i>
            {{ __('Service') }}
        </a>
    </li>
@endcan

@can('Color-section-management')
    <li class="">
        <a href="{{ route('admin.colorSectionManagement.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/color-section-management**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-paint"></i>
            {{ __('Color Section') }}
        </a>
    </li>
@endcan

@can('Project-view')
    <li class="">
        <a href="{{ route('admin.projects.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/projects**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-portfolio"></i>
            {{ __('Project') }}
        </a>
    </li>
@endcan

@can('Course-view')
    <li class="">
        <a href="{{ route('admin.courses.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/courses**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-notebook"></i>
            {{ __('Course') }}
        </a>
    </li>
@endcan

@can('Achievement-view')
    <li class="">
        <a href="{{ route('admin.achievements.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/achievements**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-medal"></i>
            {{ __('Achievements') }}
        </a>
    </li>
@endcan

@can('Experience-view')
    <li class="">
        <a href="{{ route('admin.experiences.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/experiences**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-global"></i>
            {{ __('Experiences') }}
        </a>
    </li>
@endcan

@can('Education-view')
    <li class="">
        <a href="{{ route('admin.education.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/education**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-study"></i>
            {{ __('Education') }}
        </a>
    </li>
@endcan

@can('Testimonial-view')
    <li class="">
        <a href="{{ route('admin.testimonials.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/testimonials**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-news-paper"></i>
            {{ __('Testimonials') }}
        </a>
    </li>
@endcan

@can('Client-view')
    <li class="">
        <a href="{{ route('admin.clients.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/clients**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-users"></i>
            {{ __('Clients') }}
        </a>
    </li>
@endcan

@can('Theme-view')
    <li class="">
        <a href="{{ route('admin.themes.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/themes**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-plugin"></i>
            {{ __('Themes') }}
        </a>
    </li>
@endcan


@can('Menu-view')
    <li class="">
        <a href="{{ route('admin.menus.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/menus**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-menu"></i>
            {{ __('Menus') }}
        </a>
    </li>
@endcan

@can('Contactinfo-view')
    <li class="">
        <a href="{{ route('admin.contactinfos.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/contactinfos**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-phone"></i>
            {{ __('Contactinfos') }}
        </a>
    </li>
@endcan

@can('Social-view')
    <li class="">
        <a href="{{ route('admin.socials.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/socials**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-box1"></i>
            {{ __('Footer & Social') }}
        </a>
    </li>
@endcan

@can('ProfessionCategory-view')
    <li class="">
        <a href="{{ route('admin.professionCategories.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/professionCategories**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-map"></i>
            {{ __('Profession Categories') }}
        </a>
    </li>
@endcan

@can('Profession-view')
    <li class="">
        <a href="{{ route('admin.professions.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/professions**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-lintern"></i>
            {{ __('Professions') }}
        </a>
    </li>
@endcan

@can('SkillList-view')
    <li class="">
        <a href="{{ route('admin.skillLists.index') }}"
            class="{{ Request::is(config('admin.admin_route_prefix') . '/skillLists**') ? 'mm-active' : '' }}">
            <i class="metismenu-icon pe-7s-star"></i>
            {{ __('Skill Lists') }}
        </a>
    </li>
@endcan



{{-- Contacts --}}
@can('contact-view')
    @if (Route::has('admin.contacts'))
        <li class="">
            <a href="{{ route('admin.contacts') }}"
                class="{{ request()->route()->getName() == 'admin.contacts' ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-network"></i>
                {{ __('Contacts') }}
            </a>
        </li>
    @endif
@endcan
{{-- Feedbacks --}}
@can('feedback-view')
    @if (Route::has('admin.feedbacks'))
        <li class="">
            <a href="{{ route('admin.feedbacks') }}"
                class="{{ request()->route()->getName() == 'admin.feedbacks' ? 'mm-active' : '' }}">
                <i class="metismenu-icon pe-7s-note2"></i>
                {{ __('Feedbacks') }}
            </a>
        </li>
    @endif
@endcan
<li class="app-sidebar__heading">{{ __('System Menu') }}</li>

{{-- Setting --}}
<li>
    <a href="#">
        <i class="metismenu-icon pe-7s-settings"></i>
        {{ __('Settings') }}
        <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
    </a>
    <ul>

        @can('website-setting')
            <li class="{{ request()->route()->getName() == 'admin.websiteSettings.index' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.websiteSettings.index') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Website Setting') }}
                </a>
            </li>
        @endcan
        {{-- User --}}
        @can('CustomDomain-request')
            <li class="{{ Request::is(config('admin.admin_route_prefix') . '/custom-domain**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.customDomains.requestDomainPage') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Custom Domain') }}
                </a>
            </li>
        @endcan


        @can('setting-view')
            <li class="{{ request()->route()->getName() == 'admin.settings.index' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('General Setting') }}
                </a>
            </li>
        @endcan
        @can('setting-view')
            <li class="{{ request()->route()->getName() == 'admin.settings.updateEmailSettingView' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.settings.updateEmailSettingView') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Email Setting') }}
                </a>
            </li>
        @endcan
        @can('Language-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix') . '/languages**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.languages.index') }}" class="">
                    <i class="metismenu-icon pe-7s-comment"></i>
                    {{ __('Languages') }}
                </a>
            </li>
        @endcan
        {{-- Backup --}}
        @can('backup')
            <li class="{{ request()->route()->getName() == 'admin.backups.index' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.backups.index') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('Backup') }}
                </a>
            </li>
        @endcan

        @can('role-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix') . '/roles**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.roles.index') }}" class="">
                    <i class="metismenu-icon pe-7s-user"></i>
                    {{ __('Roles') }}
                </a>
            </li>
        @endcan
        {{-- admin --}}
        @can('CustomDomain-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix') . '/customDomains**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.customDomains.index') }}">
                    <i class="metismenu-icon pe-7s-menu"></i>
                    {{ __('Custom Domains') }}
                </a>
            </li>
        @endcan
        @can('admin-view')
            <li class="{{ Request::is(config('admin.admin_route_prefix') . '/admins**') ? 'mm-active' : '' }}">
                <a href="{{ route('admin.admins.index') }}" class="">
                    <i class="metismenu-icon pe-7s-add-user"></i>
                    {{ __('System Administrator') }}
                </a>
            </li>
        @endcan
        @can('maintenance-mode')
            <li class="{{ request()->route()->getName() == 'admin.maintenanceMode' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.maintenanceMode') }}" class="">
                    <i class="metismenu-icon pe-7s-hammer"></i>
                    {{ __('Maintenance Mode') }}
                </a>
            </li>
        @endcan
    </ul>
</li>



@can('log-activity-view')
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-diamond"></i>
            {{ __('Activity Log') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            <li class="{{ request()->route()->getName() == 'admin.userLoginActivity' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.userLoginActivity') }}">
                    <i class="metismenu-icon"></i>
                    {{ __('User Login Activity') }}
                </a>
            </li>
            <li class="{{ request()->route()->getName() == 'admin.adminLoginActivity' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.adminLoginActivity') }}">
                    <i class="metismenu-icon">
                    </i>{{ __('Admin Login Activity') }}
                </a>
            </li>
            <li class="{{ request()->route()->getName() == 'admin.systemActivityLog' ? 'mm-active' : '' }}">
                <a href="{{ route('admin.systemActivityLog') }}">
                    <i class="metismenu-icon">
                    </i>
                    {{ __('System Activity Log') }}
                </a>
            </li>
            <li class="">
                <a href="{{ URL::to(config('log-viewer.route_path')) }}" target="_blank">
                    <i class="metismenu-icon">
                    </i>
                    {{ __('Log viewer') }}
                </a>
            </li>
        </ul>
    </li>
@endcan
@if (auth()->user()->can('Visitor-info') || auth()->user()->can('Visitor-block-list'))
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-id"></i>
            {{ __('Visitors') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            @can('Visitor-info')
                <li class="{{ request()->route()->getName() == 'admin.visitorInfo' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.visitorInfo') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Visitor Info') }}
                    </a>
                </li>
            @endcan
            @can('Visitor-block-list')
                <li class="{{ request()->route()->getName() == 'admin.visitorBlockList' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.visitorBlockList') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Visitor Block List') }}
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endif
{{-- @endcan --}}
@if (auth()->user()->can('Page-view') || auth()->user()->can('Content-view'))
    <li>
        <a href="#">
            <i class="metismenu-icon pe-7s-album"></i>
            {{ __('Frontend CMS') }}
            <i class="metismenu-state-icon pe-7s-angle-down caret-left"></i>
        </a>
        <ul>
            @can('Page-view')
                <li
                    class="{{ Request::is(config('admin.admin_route_prefix') . '/frontend-cms/page**') ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.frontendCMS.page') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Pages') }}
                    </a>
                </li>
            @endcan
            @can('Content-view')
                <li class="{{ request()->route()->getName() == 'admin.frontendCMS.content' ? 'mm-active' : '' }}">
                    <a href="{{ route('admin.frontendCMS.content') }}">
                        <i class="metismenu-icon"></i>
                        {{ __('Content') }}


                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endIf


<li class="">
    <a href="{{ route('admin.logout') }}"
        onclick="event.preventDefault();
    document.getElementById('logout-form').submit();">
        <i class="metismenu-icon pe-7s-back"></i>
        {{ __('Logout') }}
    </a>
    <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
</li>
@can('Blog-view')
<li class="">
    <a href="{{route('admin.blogs.index')}}" class="{{ Request::is(config('admin.admin_route_prefix').'/blogs**') ? 'mm-active' : '' }}">
        <i class="metismenu-icon pe-7s-menu"></i>
        {{ __('Blogs') }}
    </a>
</li>
@endcan

