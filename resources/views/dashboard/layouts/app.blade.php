<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TegalTour | Dashboard</title>
    <!-- icon fontawesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- icon atas -->
    <link rel="icon" href="/images/icon/tour-logo.png" type="image/x-icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Source+Sans+3:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/fontawesome-free/css/all.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.css">
    <!-- trix editor -->
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">
    <!-- Tambahkan tautan ke library CSS Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Tambahkan tautan ke library CSS DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">



</head>
<body class="sidebar-mini layout-fixed sidebar-open bg-dark"  >

    <div class="wrapper bg-white" >

        @include('dashboard.layouts.includes.navbar')
        @include('dashboard.layouts.includes.sidebar')

        <div>
            @include('sweetalert::alert')
            @yield('content')
        </div>

        @include('dashboard.layouts.includes.footer')

        <aside class="control-sidebar control-sidebar-dark">
        </aside>
        
    </div>


<!-- jQuery -->
<script src="{{asset('AdminLTE')}}/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{asset('AdminLTE')}}/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="{{asset('AdminLTE')}}/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="{{asset('AdminLTE')}}/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="{{asset('AdminLTE')}}/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="{{asset('AdminLTE')}}/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="{{asset('AdminLTE')}}/plugins/moment/moment.min.js"></script>
<script src="{{asset('AdminLTE')}}/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{asset('AdminLTE')}}/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="{{asset('AdminLTE')}}/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="{{asset('AdminLTE')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="{{asset('AdminLTE')}}/dist/js/adminlte.js"></script>
<!-- trixeditor -->
<script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>
<!-- data tables -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<!-- Tambahkan tautan ke library JavaScript Bootstrap -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Tambahkan tautan ke library JavaScript DataTables -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('#kategori-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#datauser-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#datamitra-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#datacust-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#paket-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#requestmitra-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#rekening-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#wisata-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#order-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#perjalanan-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#rekeningadmin-table').DataTable();
    });
</script>

<script>
    $(document).ready(function() {
        $('#orderadmin-table').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#wisataaktif-table').DataTable();
    });
</script>
<script>
    $(document).ready(function() {
        $('#wisatanonaktif-table').DataTable();
    });
</script>

</body>
</html>
