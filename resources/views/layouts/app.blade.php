<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- include header -->
        @include('layouts.header')
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">    
        <div class="wrapper">
           
                @yield('content')
            
            <footer class="main-footer">
                <strong>Copyright &copy; {{ date('Y') }} <a href="{{ url('/')}}">AINET</a>.</strong>
                All rights reserved.
            </footer>
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
              <!-- Control sidebar content goes here -->
            </aside>
        </div>
        @include('layouts.footerjs')
        @yield('pagejs')
        
    </body>
</html>
    