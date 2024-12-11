<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AINET</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                {{--  <a href="{{route('admin.profile.edit')}}"> <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image"></a>  --}}
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user() ? Auth::user()->name : '' }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}"
                        class="nav-link @if (route('admin.dashboard') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}"
                        class="nav-link @if (route('admin.users.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Users
                        </p>
                    </a>
                </li>
                {{--  <li class="nav-item">
                    <a href="{{ route('admin.cms.index') }}"
                        class="nav-link @if (route('admin.cms.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-book"></i>
                        <p>
                            Cms Page
                        </p>
                    </a>
                </li>  --}}
                   {{--  <li class="nav-item">
                    <a href="{{ route('admin.appointments.index') }}"
                        class="nav-link @if (route('admin.appointments.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-calendar"></i>
                        <p>
                            Appointments
                        </p>
                    </a>
                </li>  --}}
                {{--  <li class="nav-item">
                    <a href="{{ route('admin.notification.index') }}"
                        class="nav-link @if (route('admin.notification.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-bell"></i>
                        <p>
                            Push Notification
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.emailnotification.index') }}"
                        class="nav-link @if (route('admin.emailnotification.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email Notification
                        </p>
                    </a>
                </li>
                  <li class="nav-item">
                    <a href="{{ route('admin.emailtemplate.index') }}"
                        class="nav-link @if (route('admin.emailtemplate.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-envelope"></i>
                        <p>
                            Email Template
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.smsnotification.index') }}"
                        class="nav-link @if (route('admin.smsnotification.index') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-comments"></i>
                        <p>
                            SMS Notification
                        </p>
                    </a>
                </li>
                    <li class="nav-item">
                    <a href="{{ route('admin.enquiries') }}"
                        class="nav-link @if (route('admin.enquiries') == URL::current()) active @endif">
                        <i class="nav-icon fas fa-question"></i>
                        <p>
                            Enquiries
                        </p>
                    </a>
                </li>  --}}
                {{--  <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Settings
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="{{route('admin.setting.index')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Social Auth</p>
                            </a>
                        </li>
                       <li class="nav-item">
                            <a href="{{url('admin/logs')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Logs</p>
                            </a>
                        </li>
                           <li class="nav-item">
                            <a href="{{url('admin/setting/payments')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Payments Methods</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>  --}}
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
