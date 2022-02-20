<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Academic system | {{ $title }}</title>
    @include('dashboard.layouts.head')
</head>
<body class="hold-transition sidebar-mini dark-mode sidebar-collapse">
    <!-- Site wrapper -->
    <div class="wrapper">
        @include('dashboard.layouts.navbar')
        @include('dashboard.layouts.sitebar')

        <!-- Content Wrapper. Contains page content -->
        @yield('content')
        <!-- /.content-wrapper -->
        @include('dashboard.layouts.footer')
        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
    @include('dashboard.layouts.foot')
</body>
</html>
