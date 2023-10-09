<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GUNA BAKTI | {{ $active_page }}</title>
    <link rel="icon" href="{!! asset('gambar/gunabakti-logo.png') !!}" />


    @include('template.css')

    {{-- @livewireStyles --}}

</head>
<!--
`body` tag options:

  Apply one or more of the following classes to to the body tag
  to get the desired effect

  * sidebar-collapse
  * sidebar-mini
-->

{{-- sweetalert --}}


<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <!--sweet alert  -->
    {{-- @include('sweetalert::alert') --}}
    <div class="wrapper">
        {{-- spin reload --}}
        <div id="cover-spin"></div>
        <!-- Navbar -->
        @include('template.nav')
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('template.side')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
        </div>
        <!-- /.content-wrapper -->
        <!-- Main Footer -->
        @include('template.footer')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->
    @include('template.js')
    @stack('script')
</body>

</html>
