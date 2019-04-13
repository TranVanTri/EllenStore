<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Website bán hàng thời trang">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Trang quản trị</title>
    <!-- thiết lập url tương đối -->
    <base href="{{asset('')}}">
    
    <!-- Bootstrap Core CSS -->
    <link href="admin_asset/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="admin_asset/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="dropzone/dist/basic.css" />
    <link rel="stylesheet" href="dropzone/dist/dropzone.css"/>
    <link href="admin_asset/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="admin_asset/dist/css/fSelect.css" rel="stylesheet">
    <link href="admin_asset/dist/css/my-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin_asset/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- DataTables CSS -->
    <link href="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="admin_asset/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link href="admin_asset/bower_components/eonasdan-bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.min.css" rel="stylesheet">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        @include('admin.layout.header')

        <!-- Page Content -->
        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>


    <script src="admin_asset/bower_components/moment/min/moment.min.js"></script>
    
    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="admin_asset/bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>

    <!-- DataTables JavaScript -->
    <script src="admin_asset/bower_components/DataTables/media/js/jquery.dataTables.min.js"></script>
    <script src="admin_asset/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    {{-- ****************************************************** --}}
     
    {{-- *************************************************************** --}}
    

    <script type="text/javascript" src="js/jquery.validate.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>  
    <script src="vendor/laravel-filemanager/js/lfm.js"></script>
    <script src="admin_asset/js/fSelect.js"></script>
    <script src="dropzone/dist/dropzone.js"></script>  
    <script src="admin_asset/js/myJS.js"></script>
     




    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>    
         Dropzone.autoDiscover = false;
        $(document).ready(function() {
            $('#dataTables-example').DataTable({
                responsive: true
            });  
            // $('#dataTables-history').DataTable({
            //     responsive: true,               
            // });               
        });
        
    </script>


    
</body>

</html>
