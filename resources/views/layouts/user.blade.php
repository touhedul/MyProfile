<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="{{ asset('admin/main.css') }}" rel="stylesheet">
    {{-- parsley validator --}}
    {{-- <link href="{{ asset('parsley/parsley.css') }}" rel="stylesheet"> --}}
    {{-- My css --}}
    <link href="{{ asset('my_files/mycss.css') }}" rel="stylesheet">
    {{-- Flash Notification --}}
    <link href="{{ asset('css/iziToast.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    @stack('css')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">



</head>

<body>
    <div class="app-container  app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        {{-- Change class for changing color. Take class from below data class --}}
        <div
            class="app-header header-shadow
        {{ setting('admin_header_color') ?? 'bg-asteroid header-text-light' }}">
            <div class="app-header__logo">
                <a href="{{ route('user.dashboard') }}">
                    <div class="logo-src"
                        @if (setting('admin_logo')) style="--background: url({{ asset('images/' . setting('admin_logo')) }})"
                @else

                style="--background: url(assets/images/logo.png)" @endif>
                    </div>
                </a>
                <div class="header__pane ml-auto">
                    <div>
                        <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                            data-class="closed-sidebar">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="app-header__mobile-menu">
                <div>
                    <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
            <div class="app-header__menu">
                <span>
                    <button type="button"
                        class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                        <span class="btn-icon-wrapper">
                            <i class="fa fa-ellipsis-v fa-w-6"></i>
                        </span>
                    </button>
                </span>
            </div>
            <div class="app-header__content">
                <div class="app-header-left">
                    <div class="search-wrapper">
                        <div class="input-holder">
                            <input id="tags" type="text" class="search-input" placeholder="{{ __('Type to search') }}">
                            <button id="search-button" class="search-icon"><span></span></button>
                        </div>
                        <button class="close"></button>
                    </div>
                    <ul class="header-menu nav">

                        <li class="btn-group nav-item">
                            <a href="{{ route('index') }}" target="_blank" class="nav-link">
                                <i class="nav-link-icon fas fa-share-square"></i>
                                {{ __('Visit Site') }}
                            </a>
                        </li>
                    </ul>
                </div>
                @php
                    $notifications = App\Models\Notification::where('read_status', 0)
                        ->latest()
                        ->where('user_id',auth()->id())
                        ->take(10)
                        ->get();
                @endphp
                <div class="app-header-right">
                    <div class="header-btn-lg pr-0">
                        <div class="widget-content p-0">
                            <div class="widget-content-wrapper">
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            @if (count($notifications) > 0)
                                                <span class="notification"></span>
                                            @endif
                                            <i class="nav-link-icon fas fa-bell fa-2x"></i><i
                                            class="fa fa-angle-down ml-2 opacity-8 "></i>
                                            &nbsp;&nbsp;&nbsp;
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true"
                                            class="dropdown-menu dropdown-menu-right"
                                            style="--width:30rem;max-height:400px; overflow-y:auto">
                                            <h6 tabindex="-1" class="dropdown-header">{{ __('Notifications') }} </h6>

                                            @forelse ($notifications as $notification)
                                                @if ($notification->link)
                                                    <a type="button" href="{{ $notification->link }}" tabindex="0"
                                                        class="dropdown-item"> {{ $loop->index + 1 }}.
                                                        {{ $notification->title }}</a>
                                                @else
                                                    <span class="dropdown-item-2"> {{ $loop->index + 1 }}.
                                                        {{ $notification->title }}</span>
                                                @endif
                                            @empty
                                                <span class="dropdown-item-2">{{ __('No New Notification') }}</span>
                                            @endforelse
                                            <hr>
                                            <div class="row justify-content-center" style="margin-left: 12px">
                                                <div class="col-md-6">
                                                    <a type="button" href="{{ route('admin.notifications.index') }}"
                                                        tabindex="0" class="btn btn-primary">{{ __('View All') }}</a>

                                                    @if (count($notifications) > 0)
                                                        <a type="button" style="margin-top: 10px"
                                                            href="{{ route('admin.notifications.markAllRead') }}"
                                                            tabindex="0" class="btn btn-warning ">{{ __('Mark All Read') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="widget-content-left">
                                    <div class="btn-group">
                                        <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                            class="p-0 btn">
                                            <img width="42" class="rounded-circle"
                                                src="{{ asset('admin/assets/images/avatars/avatar.jpg') }}" alt="">
                                            <i class="fa fa-angle-down ml-2 opacity-8"></i>
                                        </a>
                                        <div tabindex="-1" role="menu" aria-hidden="true" style="--width:15rem"
                                            class="dropdown-menu dropdown-menu-right">
                                            <h6 tabindex="-1" class="dropdown-header">{{ __('Profile Setting') }}</h6>

                                                <a type="button" href="{{ route('user.change.password') }}" tabindex="0"
                                                    class="dropdown-item">{{ __('Change Password') }}</a>

                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();"
                                                type="button" tabindex="0" class="dropdown-item">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </div>
                                </div>


                                <div class="widget-content-left  ml-3 header-user-info">
                                    <div class="widget-heading">
                                        {{ __('Hello') }} {{ auth()->user()->name }}
                                    </div>
                                    <div class="widget-subheading">
                                        {{ __('Welcome') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ui-theme-settings">
            {{-- Comment this for the spinner setting --}}
            {{-- <button type="button" id="TooltipDemo" class="btn-open-options btn btn-warning">
                <i class="fa fa-cog fa-w-16 fa-spin fa-2x"></i>
            </button> --}}
        </div>
        <div class="app-main ">
            {{-- Change class for changing color. Take class from avobe data class --}}
            <div
                class="app-sidebar sidebar-shadow
            {{ setting('admin_sidebar_color') ?? 'bg-asteroid sidebar-text-light' }}
            ">
                <div class="app-header__logo">
                    <div class="logo-src"></div>
                    <div class="header__pane ml-auto">
                        <div>
                            <button type="button" class="hamburger close-sidebar-btn hamburger--elastic"
                                data-class="closed-sidebar">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="app-header__mobile-menu">
                    <div>
                        <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="app-header__menu">
                    <span>
                        <button type="button"
                            class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                            <span class="btn-icon-wrapper">
                                <i class="fa fa-ellipsis-v fa-w-6"></i>
                            </span>
                        </button>
                    </span>
                </div>
                <div class="scrollbar-sidebar">
                    <div class="app-sidebar__inner ">
                        <ul class="vertical-nav-menu ">
                            @include('includes.user_sidebar')
                        </ul>
                    </div>
                </div>
            </div>
            <div class="app-main__outer">
                @include('includes.user_message')
                <div class="app-main__inner">
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
                            <div class="container">
                                @yield('content')
                            </div>

                        </div>
                    </div>
                </div>
                <div class="app-wrapper-footer">
                    <div class="app-footer">
                        <div class="app-footer__inner">
                            <div class="app-footer-left">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <span href="javascript:void(0);" class="nav-link">
                                            All Rights Reserved by
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('index') }}" target="_blank" class="nav-link">
                                            {{ env('APP_NAME') }}.
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="app-footer-right">
                                <ul class="nav">
                                    <li class="nav-item">
                                        <span href="javascript:void(0);" class="nav-link">
                                            Technology Partner
                                        </span>
                                    </li>
                                    <li class="nav-item">
                                        {{-- <a href="http://skoder.co" target="_blank" class="nav-link">
                                            Skoder
                                        </a> --}}
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="modal">
            </div>
            <script src="http://maps.google.com/maps/api/js?sensor=true"></script>
        </div>
    </div>
    <!-- Jquery -->
    <script src="{{ asset('admin/assets/scripts/jquery.min.js') }}"></script>
    {{-- Main --}}
    <script type="text/javascript" src="{{ asset('admin/assets/scripts/main.js') }}"></script>
    {{-- Flash Notification --}}
    <script src="{{ asset('js/iziToast.js') }}"></script>
    {{-- Select 2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    {{-- Jquery UI --}}
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>


    <script>
        $(function() {
            $(document).on('click', '#search-button', function() {
                $("#tags").focus();
            });
            @php
                $userPermissions = auth()
                    ->user()
                    ->getAllPermissions()
                    ->where('search_status', 1);
            @endphp
            var availableTags = [

                @foreach ($userPermissions as $userPermission)
                    {
                        value: "{{ $userPermission->route }}",
                        label: "{{ str_replace('-', ' ', $userPermission->name) }}"
                    },
                @endforeach

                @can('setting-we')
                    {
                        value: "{{ route('admin.users.create') }}",
                        label: "Check"
                    },
                @endcan

            ];
            $("#tags").autocomplete({
                source: availableTags,
                select: function(event, ui) {
                    window.location.href = ui.item.value;
                }
            });
        });
    </script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    @include('vendor.lara-izitoast.toast')
    @yield('script')
    @stack('script')
    <script>
        // Ajax Loading
        $body = $("body");
        $(document).on({
            ajaxStart: function() {
                $body.addClass("loading");
            },
            ajaxStop: function() {
                $body.removeClass("loading");
            }
        });
    </script>


    {{-- Turbo links --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/turbolinks/5.0.0/turbolinks.min.js" integrity="sha512-ifx27fvbS52NmHNCt7sffYPtKIvIzYo38dILIVHQ9am5XGDQ2QjSXGfUZ54Bs3AXdVi7HaItdhAtdhKz8fOFrA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

</body>

</html>
