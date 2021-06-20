<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  
        <title> Crypto </title>
        <link href="/site/assets/plugins/bootstrap/bootstrap.min.css" rel="stylesheet">
  <link href="/site/assets/fonts/cryptocoins.css" rel="stylesheet">
  <!-- Simple line icons -->
  <link href="/site/assets/css/simple-line-icons.css" rel="stylesheet">
  <!-- Font awesome icons -->
  <link href="/site/assets/css/font-awesome.min.css" rel="stylesheet">
  <link href="/site/assets/css/font-awesome-animation.min.css" rel="stylesheet">
  <!-- Custom Style -->
  <link href="/site/assets/plugins/select2/select2.min.css" rel="stylesheet">
  <link href="/site/assets/css/custom.css" rel="stylesheet">
  <link id="ui-current-skin" href="/site/assets/css/skin-colors/skin-yellow.css" rel="stylesheet">
  <link href="/site/assets/css/media.css" rel="stylesheet">
  <!-- Charts -->
  <link href="/site/assets/plugins/rickshaw/rickshaw.min.css" rel="stylesheet">
  <!-- Custom Font -->
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

</head>
    </head>
    <body id="app-container" class="menu-default show-spinner" >
        <div id="app">
            <Login>
<router-view ></router-view>

            </Login>
        </div>


       <!-- JavaScript Bundle with Popper -->
       <script src="{{ asset('/js/app.js') }}"></script>
       <script src="/site/assets/js/jquery.min.js"></script>
    <script src="/site/assets/js/jquery.scrollbar.min.js"></script>
    <script src="/site/assets/plugins/modernizr/modernizr.custom.js"></script>
    <script src="/site/assets/plugins/classie/classie.js"></script>
    <script src="/site/assets/plugins/bootstrap/bootstrap.min.js"></script>
    <script src="/site/assets/plugins/select2/select2.min.js"></script>
    <script src="/site/assets/plugins/highcharts/highcharts.js"></script>
    <script src="/site/assets/plugins/highcharts/exporting.js"></script>
    <!-- Custom Charts Scripts -->
    <script src="/site/assets/js/charts.js"></script>
    <script src="/site/assets/plugins/amcharts/amcharts.js"></script>
    <script src="/site/assets/plugins/amcharts/depthChart/serial.js"></script>
    <script src="/site/assets/plugins/amcharts/depthChart/export.min.js"></script>
    <script src="/site/assets/plugins/amcharts/depthChart/light.js"></script>
    <script src="/site/assets/js/charts-amcharts.js"></script>
    <!-- Custom Theme Scripts -->
    <script src="/site/assets/js/custom.min.js"></script>
    <script src="/site/assets/js/preloader.min.js"></script>

    </body>
</html>
