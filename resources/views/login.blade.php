<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="{{asset('font/iconsmind-s/css/iconsminds.css')}}" />
        <link rel="stylesheet" href="{{asset('font/simple-line-icons/css/simple-line-icons.css')}}" />
    
        <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/bootstrap.rtl.only.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/fullcalendar.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/dataTables.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/datatables.responsive.bootstrap4.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/perfect-scrollbar.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-stars.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/nouislider.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/bootstrap-datepicker3.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/vendor/component-custom-switch.min.css')}}" />
        <link rel="stylesheet" href="{{asset('css/main.css')}}" />
    </head>
    <body id="app-container" class="menu-default show-spinner" >
        <div id="app">
            <Login>
<router-view ></router-view>

            </Login>
        </div>


       <!-- JavaScript Bundle with Popper -->
       <script src="{{ asset('/js/app.js') }}"></script>
       <script src="/js/vendor/jquery-3.3.1.min.js"></script>
       <script src="/js/vendor/bootstrap.bundle.min.js"></script>
       <script src="/js/vendor/Chart.bundle.min.js"></script>
       <script src="/js/vendor/chartjs-plugin-datalabels.js"></script>
       <script src="/js/vendor/moment.min.js"></script>
       <script src="/js/vendor/fullcalendar.min.js"></script>
       <script src="/js/vendor/datatables.min.js"></script>
       <script src="/js/vendor/perfect-scrollbar.min.js"></script>
       <script src="/js/vendor/progressbar.min.js"></script>
       <script src="/js/vendor/jquery.barrating.min.js"></script>
       <script src="/js/vendor/nouislider.min.js"></script>
       <script src="/js/vendor/bootstrap-datepicker.js"></script>
       <script src="/js/vendor/Sortable.js"></script>
       <script src="/js/vendor/mousetrap.min.js"></script>
       <script src="/js/dore.script.js"></script>
       <script src="/js/scripts.js"></script>

    </body>
</html>
