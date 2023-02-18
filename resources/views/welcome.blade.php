<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="http://127.0.0.1:8000/frontend/assets/"
  data-template="vertical-menu-template-free">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Dashboard - Analytics | Sneat - Bootstrap 5 HTML Admin Template - Pro</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="http://127.0.0.1:8000/frontend/assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/css/demo.css" />
    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/app.css')}}">
   
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="http://127.0.0.1:8000/frontend/assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="http://127.0.0.1:8000/frontend/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
  
    <script src="http://127.0.0.1:8000/frontend/assets/js/config.js"></script>
  </head>
    <body>

    <div id="app">
      <home-component></home-component>      
    </div>

        <!-- Core JS -->
        <!-- build:js assets/vendor/js/core.js -->
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/libs/jquery/jquery.js"></script>
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/libs/popper/popper.js"></script>
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/js/bootstrap.js"></script>
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/js/menu.js"></script>
        <!-- endbuild -->
    
        <!-- Vendors JS -->
        <script src="http://127.0.0.1:8000/frontend/assets/vendor/libs/apex-charts/apexcharts.js"></script>
    
        <!-- Main JS -->
        <script src="http://127.0.0.1:8000/frontend/assets/js/main.js"></script>
    
        <!-- Page JS -->
        <script src="http://127.0.0.1:8000/frontend/assets/js/dashboards-analytics.js"></script>
    
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="https://buttons.github.io/buttons.js"></script>
          <script src="{{ asset('js/app.js')}}"></script>
        </body>
</html>
