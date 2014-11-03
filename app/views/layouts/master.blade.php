<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js sidebar-large lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js sidebar-large lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js sidebar-large lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js sidebar-large"> <!--<![endif]-->

<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
@include('includes.haed_master')

<body data-page="dashboard">
    <!-- BEGIN TOP MENU -->
    @include('includes.nav_master')
    <!-- END TOP MENU -->
    <!-- BEGIN WRAPPER -->
    <div id="wrapper">
        <!-- BEGIN MAIN SIDEBAR -->
        @include('includes.sidebar')
        <!-- END MAIN SIDEBAR -->


        <!-- BEGIN MAIN CONTENT -->
       @yield('content')

    </div>
    <!-- END WRAPPER -->
    <!-- BEGIN CHAT MENU -->
    
    <!-- END CHAT MENU -->
    <!-- BEGIN MANDATORY SCRIPTS -->
    @include('includes.footer_master')
</body>

</html>