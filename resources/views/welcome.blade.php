<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Admin dashboard</title>
        <link rel="stylesheet" href="font/iconsmind-s/css/iconsminds.css" />
        <link rel="stylesheet" href="font/simple-line-icons/css/simple-line-icons.css" />
    </head>
    <body >
       <div id="app">
    </div>
        <script src="{{ mix('/js/app.js') }}"></script>
       <script src="{{asset('/js/vendor/jquery-3.3.1.min.js')}}"></script>
       <script src="{{asset('/js/vendor/bootstrap.bundle.min.js')}}"></script>
       <script src="{{asset('/js/vendor/Chart.bundle.min.js')}}"></script>
       <script src="{{asset('/js/vendor/chartjs-plugin-datalabels.js')}}"></script>
       <script src="{{asset('/js/vendor/moment.min.js')}}"></script>
       <script src="{{asset('/js/vendor/fullcalendar.min.js')}}"></script>
       <script src="{{asset('/js/vendor/datatables.min.js')}}"></script>
       <script src="{{asset('/js/vendor/perfect-scrollbar.min.js')}}"></script>
       <script src="{{asset('/js/vendor/progressbar.min.js')}}"></script>
       <script src="{{asset('/js/vendor/jquery.barrating.min.js')}}"></script>
       <script src="{{asset('/js/vendor/select2.full.js')}}"></script>
       <script src="{{asset('/js/vendor/nouislider.min.js')}}"></script>
       <script src="{{asset('/js/vendor/bootstrap-datepicker.js')}}"></script>
       <script src="{{asset('/js/vendor/Sortable.js')}}"></script>
       <script src="{{asset('/js/vendor/mousetrap.min.js')}}"></script>
       <script src="{{asset('/js/vendor/glide.min.js')}}"></script>
       <script src="{{asset('/js/dore.script.js')}}"></script>
       <script src="{{asset('/js/scripts.js')}}"></script>

       <!-- JavaScript Bundle with Popper -->

    </body>
</html>
