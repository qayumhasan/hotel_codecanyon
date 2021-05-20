
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Admin Login</title>

      <!-- Favicon -->
      <link rel="shortcut icon" href="{{asset('public/backend')}}/assets/images/favicon.ico" />
        <!-- backedn css -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/backend.css?v=1.0.1">
      <!-- font-awesome css -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css">
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/line-awesome/dist/line-awesome/css/line-awesome.min.css">
      <!-- remixicon css -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/remixicon/fonts/remixicon.css">
      <!-- dripicons css -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/@icon/dripicons/dripicons.css">
        <!-- fullcalendar css -->
      <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/core/main.css"/>
      <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/daygrid/main.css"/>
      <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/timegrid/main.css" />
      <link rel='stylesheet' href="{{asset('public/backend')}}/assets/vendor/fullcalendar/list/main.css" />
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/vendor/mapbox/mapbox-gl.css">
      <!-- izitost css -->
      <link rel="stylesheet" href="{{asset('public/backend')}}/assets/css/izitost.css">
    </head>
  <body>
      <div class="wrapper">
      <section class="login-content">
         <div class="container h-100">
           @yield('contents')
         </div>
      </section>
      </div>
    <!-- Backend Bundle JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/backend-bundle.min.js"></script>
    <!-- Flextree Javascript-->
    <script src="{{asset('public/backend')}}/assets/js/flex-tree.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/tree.js"></script>
    <!-- Table Treeview JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/table-treeview.js"></script>
    <!-- Masonary Gallery Javascript -->
    <script src="{{asset('public/backend')}}/assets/js/masonry.pkgd.min.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/imagesloaded.pkgd.min.js"></script>
    <!-- Mapbox Javascript -->
    <script src="{{asset('public/backend')}}/assets/js/mapbox-gl.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/mapbox.js"></script>
    <!-- Fullcalender Javascript -->
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/core/main.js"></script>
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/daygrid/main.js"></script>
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/timegrid/main.js"></script>
    <script src="{{asset('public/backend')}}/assets/vendor/fullcalendar/list/main.js"></script>
    <!-- SweetAlert JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/sweetalert.js"></script>
    <!-- Vectoe Map JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/vector-map-custom.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/customizer.js"></script>
    <!-- Chart Custom JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/chart-custom.js"></script>
    <!-- slider JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/slider.js"></script>
    <script src="{{asset('public/backend')}}/assets/js/izitost.js"></script>
    <script>
        @if(Session::has('messege'))
        var type = "{{Session::get('alert-type','info')}}"
        switch (type) {
            case 'success':

                iziToast.success({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'info':
                iziToast.info({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                brack;
            case 'warning':
                iziToast.warning({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
            case 'error':
                iziToast.error({
                    message: '{{ Session::get('messege') }}',
                    'position':'topRight'
                });
                break;
        }
        @endif
    </script>
    <!-- app JavaScript -->
    <script src="{{asset('public/backend')}}/assets/js/app.js"></script>
  </body>
</html>
