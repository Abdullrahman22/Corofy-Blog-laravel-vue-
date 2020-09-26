<!doctype html>
<html lang="en">
    <head>
        <title> Corovy Blog </title>

        <!-- Meta -->
        <meta charset="utf-8">
        <!-- IE Compatibility Meta -->
        <meta http-equiv="X-UA-Compatibale" content="IE-=edge">
        <!-- Theme Color meta-->
        <meta name="theme-color" content="#6610f2"> 
        <!-- Mobile meta-->
        <meta name="viewport" content="width=device-width, initial-scale=1">     
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">   
        <!-------------------------------------- start favicon -------------------------------> 
        <link rel="apple-touch-icon" sizes="57x57" href="{{ asset("images/favicon/apple-icon-57x57.png")}}">
        <link rel="apple-touch-icon" sizes="60x60" href="{{ asset("images/favicon/apple-icon-60x60.png")}}">
        <link rel="apple-touch-icon" sizes="72x72" href="{{ asset("images/favicon/apple-icon-72x72.png")}}">
        <link rel="apple-touch-icon" sizes="76x76" href="{{ asset("images/favicon/apple-icon-76x76.png")}}">
        <link rel="apple-touch-icon" sizes="114x114" href="{{ asset("images/favicon/apple-icon-114x114.png")}}">
        <link rel="apple-touch-icon" sizes="120x120" href="{{ asset("images/favicon/apple-icon-120x120.png")}}">
        <link rel="apple-touch-icon" sizes="144x144" href="{{ asset("images/favicon/apple-icon-144x144.png")}}">
        <link rel="apple-touch-icon" sizes="152x152" href="{{ asset("images/favicon/apple-icon-152x152.png")}}">
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset("images/favicon/apple-icon-180x180.png")}}">
        <link rel="icon" type="image/png" sizes="192x192"  href="{{ asset("images/favicon/android-icon-192x192.png")}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset("images/favicon/favicon-32x32.png")}}">
        <link rel="icon" type="image/png" sizes="96x96" href="{{ asset("images/favicon/favicon-96x96.png")}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset("images/favicon/favicon-16x16.png")}}">
        <link rel="manifest" href="{{ asset("images/favicon/manifest.json")}}">
        <meta name="msapplication-TileColor" content="#6610f2">
        <meta name="msapplication-TileImage" content="{{ asset("images/favicon/ms-icon-144x144.png")}}">
        <!-------------------------------------- End favicon  ------------------------------->  

        <!-- Google Font -->
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:300, 400,700|Inconsolata:400,700" rel="stylesheet">


        <link rel="stylesheet" href="{{ asset("css/bootstrap.css")}}">
        <link rel="stylesheet" href="{{ asset("css/animate.css")}}">
        <link rel="stylesheet" href="{{ asset("css/owl.carousel.min.css")}}">

        <link rel="stylesheet" href="{{ asset("fonts/ionicons/css/ionicons.min.css")}}">
        <link rel="stylesheet" href="{{ asset("fonts/fontawesome/css/font-awesome.min.css")}}">
        <link rel="stylesheet" href="{{ asset("fonts/flaticon/font/flaticon.css")}}">

        <!-- Theme Style -->
        <link rel="stylesheet" href="{{ asset("css/style.css")}}">
        <link rel="stylesheet" href="{{ asset("css/custom-style.css")}}">
    </head>
  <body>
    

    <div id="app" class="wrap">

        <!----- Header Component ----->
        <header-component></header-component>


        <!-----Toggle Pages ------->
        <router-view></router-view> 


        <!---- Register Modals Components ----->
        <register-model></register-model>
        <login-model></login-model>


        <!----- Footer Component ----->
        <footer-component></footer-component>


    </div>
    
        <!-- loader -->
        <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>
        <script src="{{ asset("js/app.js") }}" ></script>
        <script src="{{ asset("js/jquery-3.2.1.min.js") }}"></script>
        <script src="{{ asset("js/jquery-migrate-3.0.0.js") }}"></script>
        <script src="{{ asset("js/popper.min.js") }}"></script>
        <script src="{{ asset("js/bootstrap.min.js") }}"></script>
        <script src="{{ asset("js/owl.carousel.min.js") }}"></script>
        <script src="{{ asset("js/jquery.waypoints.min.js") }}"></script>
        <script src="{{ asset("js/jquery.stellar.min.js") }}"></script>
        <script src="{{ asset("js/main.js") }}"></script>
    </body>
</html>