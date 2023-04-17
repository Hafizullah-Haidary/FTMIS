<html dir="rtl">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* styles for screens smaller than 600px */
        @media (max-width: 600px) {
            /* adjust layout for small screens */
        }

        /* styles for screens between 600px and 1200px */
        @media (min-width: 600px) and (max-width: 1200px) {
            /* adjust layout for medium screens */
        }

        /* styles for screens larger than 1200px */
        @media (min-width: 1200px) {
            /* adjust layout for large screens */
        }

        body {
            font-size: 13px;
        }
    </style>
</head>

<body>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">

        <!-- Brand Logo -->
        <a href="/foreigntrip" class="brand-link">
            <img src="{{ asset('dist/img/logo.jpg') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><b>Foreign Trip</b></span>
        </a>

        <!-- Sidebar -->

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('dist/img/avatar.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('user.profile') }}" class="d-block">{{ auth()->user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <!-- Add icons to the links using the .nav-icon class
                       with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview menu-open">
                        <a href="/foreigntrip" class="nav-link active">

                            <p>
                                دیتابیس سفرهای خارجی
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview drop-item">
                            @if (auth()->user()->can(['foreigntrip-show']))
                                <li class="nav-item">
                                    <a href="/foreigntrip" class="nav-link">
                                        <i class="fa fa-car nav-icon"></i>
                                        <p>سفرهای خارجی</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can(['employee-show']))
                                <li class="nav-item drop-item">
                                    <a href="/employee" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>کارمندان</p>
                                    </a>
                                </li>
                            @endif

                            @if (auth()->user()->can(['department-show']))
                                <li class="nav-item drop-item">
                                    <a href="/department" class="nav-link">
                                        <i class="fa fa-users nav-icon"></i>
                                        <p>ریاست ها</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can(['invitingAuthority-show']))
                                <li class="nav-item drop-item">
                                    <a href="/inviter" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>مرجع دعوت کننده</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can(['doner-show']))
                                <li class="nav-item drop-item">
                                    <a href="/doner" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>تمویل کننده فیلوشیپ ها</p>
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                </ul>
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">

                    <li class="nav-item has-treeview menu-open">
                        <a href="/foreigntrip" class="nav-link active">
                            <i class="nav-icon fas fa-users-cog nav-icon "></i>
                            <p>
                                تنظیمات یوزرها
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>

                        <ul class="nav nav-treeview drop-item">
                            @if (auth()->user()->can(['role-show']))
                                <li class="nav-item drop-item">
                                    <a href="{{ route('role.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon"></i>
                                        <p>{{ trans('foreigntrip.Roles') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can(['permission-show']))
                                <li class="nav-item drop-item">
                                    <a href="{{ route('permission.index') }}" class="nav-link">
                                        <i class="fas fa-bomb nav-icon"></i>
                                        <p>{{ trans('foreigntrip.Permissions') }}</p>
                                    </a>
                                </li>
                            @endif
                            @if (auth()->user()->can(['user-show']))
                                <li class="nav-item drop-item">
                                    <a href="{{ route('user.index') }}" class="nav-link">
                                        <i class="fas fa-user nav-icon"></i>
                                        <p>{{ trans('foreigntrip.Users') }}</p>
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item has-treeview menu-open">
                                <a href="{{ route('user.profile') }}" class="nav-link">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        {{ trans('foreigntrip.Profile') }}
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item has-treeview menu-open">
                                <a href="{{ route('userGetPassword') }}" class="nav-link">
                                    <i class="fas fa-lock nav-icon"></i>
                                    <p>{{ trans('foreigntrip.ChangePassword') }}</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="has-treeview menu-open">
                            <a href="{{ route('foreigntripReport') }}" class="nav-link">
                                <i class="fas fa-envelope nav-icon"></i>
                                <p>{{ trans('foreigntrip.report') }}</p>
                            </a>
                        </li>
                    </ul>



                    <li class="has-treeview menu-open">
                        <a class="nav-link" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="nav-icon fas fa-power-off"></i>
                            <p>
                                {{ trans('foreigntrip.Logout') }}
                            </p>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>


                </ul>
            </nav>


        </div>

    </aside>

</body>

</html>
