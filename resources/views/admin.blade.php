<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{ asset("admin_assets/css/font-face.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/font-awesome-4.7/css/font-awesome.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/font-awesome-5/css/fontawesome-all.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/mdi-font/css/material-design-iconic-font.min.css")}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{ asset("admin_assets/vendor/bootstrap-4.1/bootstrap.min.css")}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{ asset("admin_assets/vendor/animsition/animsition.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/wow/animate.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/css-hamburgers/hamburgers.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/slick/slick.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/select2/select2.min.css")}}" rel="stylesheet" media="all">
    <link href="{{ asset("admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.css")}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{ asset("admin_assets/css/theme.css")}}" rel="stylesheet" media="all">

    <!-- custom style CSS-->
    <link href="{{ asset("admin_assets/css/custom-style.css")}}" rel="stylesheet" media="all">

</head>

<body>
    <div id="app" class="page-wrapper">
        <!-- HEADER MOBILE -->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="../../">
                            <h4> Corofy Blog </h4>
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li>
                            <router-link to="/admin/overview">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/users">
                                <i class="fas fa-users"></i>
                                Users
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/categories">
                                <i class="fas fa-sitemap"></i>
                                Categories
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/posts">
                                <i class="far fa-clipboard"></i>
                                Posts
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/comments">
                                <i class="zmdi zmdi-comment-text"></i>
                                Comments
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/messeges">
                                <i class="far fa-envelope"></i>
                                Messeges
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/setting">
                                <i class="fas fa-cog"></i>
                                Setting
                            </router-link>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a class="logo" href="../../">
                    <h4> Corofy Blog </h4>
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <router-link to="/admin/overview">
                                <i class="fas fa-tachometer-alt"></i>
                                Dashboard
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/users">
                                <i class="fas fa-users"></i>
                                Users
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/categories">
                                <i class="fas fa-sitemap"></i>
                                Categories
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/posts">
                                <i class="far fa-clipboard"></i>
                                Posts
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/comments">
                                <i class="zmdi zmdi-comment-text"></i>
                                Comments
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/messeges">
                                <i class="far fa-envelope"></i>
                                Messeges
                            </router-link>
                        </li>
                        <li>
                            <router-link to="/admin/setting">
                                <i class="fas fa-cog"></i>
                                Setting
                            </router-link>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

   
        <router-view></router-view>

    </div>

    <!-- App JS-->
    <script src="{{ asset("js/app.js") }}" ></script>

    <!-- Jquery JS-->
    <script src="{{ asset("admin_assets/vendor/jquery-3.2.1.min.js")}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{ asset("admin_assets/vendor/bootstrap-4.1/popper.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/bootstrap-4.1/bootstrap.min.js")}}"></script>
    <!-- Vendor JS       -->
    <script src="{{ asset("admin_assets/vendor/slick/slick.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/wow/wow.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/animsition/animsition.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/counter-up/jquery.waypoints.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/counter-up/jquery.counterup.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/circle-progress/circle-progress.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/perfect-scrollbar/perfect-scrollbar.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/chartjs/Chart.bundle.min.js")}}"></script>
    <script src="{{ asset("admin_assets/vendor/select2/select2.min.js")}}"></script>

    <!-- Main JS-->
    <script src="{{ asset("admin_assets/js/main.js")}}"></script>

    <!-- Main JS-->
    <script src="{{ asset("admin_assets/js/custom-file.js")}}"></script>

</body>

</html>
<!-- end document-->
