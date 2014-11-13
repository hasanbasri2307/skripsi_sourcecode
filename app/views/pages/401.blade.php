<!DOCTYPE html>
<html lang="en">
 <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Error 401</title>

    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/bootstrap-reset.css')}}" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::asset('assets/assets/font-awesome/css/font-awesome.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css')}}" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="{{URL::asset('assets/css/owl.carousel.css')}}" type="text/css">
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('assets/css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('assets/css/style-responsive.css')}}" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="{{URL::asset('assets/js/html5shiv.js')}}"></script>
      <script src="{{URL::asset('assets/js/respond.min.js')}}"></script>
    <![endif]-->
  </head>




  <body class="body-404">

    <div class="container">

      <section class="error-wrapper">
          <i class="icon-404"></i>
          <h1>401</h1>
          <h2>Unauthorized</h2>
          <p class="page-404">You don't have permission to view this page. 
              <?php
                $user = Sentry::getUser();
                $admin = Sentry::findGroupByName('admin');
                $cso = Sentry::findGroupByName('cso');
                $client = Sentry::findGroupByName('client');
                if($user->inGroup($admin))
                {
                    ?>
                    <a href="{{URL::to('/admin/dashboard')}}">Return Home</a>
                    <?php
                }
                else if($user->inGroup($cso))
                {
                     ?>
                    <a href="{{URL::to('/cso/dashboard')}}">Return Home</a>
                    <?php
                }
                else if($user->inGroup($client))
                {
                     ?>
                    <a href="{{URL::to('/client/dashboard')}}">Return Home</a>
                    <?php
                }
               
             
              ?></p>
      </section>

    </div>


  </body>
</html>
