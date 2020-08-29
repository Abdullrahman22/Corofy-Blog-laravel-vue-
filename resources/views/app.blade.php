<!doctype html>
<html lang="en">
  <head>
    <title> {{ $site_name }} </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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

      <header role="banner">

        <div class="top-bar">
          <div class="container">
            <div class="row">
                <div class="col-6 social">
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                    <a href="#"><span class="fa fa-snapchat"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                </div>
                <div class="col-6 blog-brand">
                    +214 2346 1255
                </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><router-link to="/"> {{ $site_name }}   </router-link></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <router-link class="nav-link active" to="/">Home</router-link>
                </li>
                
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    @foreach ( $categories as $category )
                      <router-link class="dropdown-item" to="/category/{{$category->slug}}">{{ $category-> title }}</router-link>
                    @endforeach
                  </div>

                </li>
                <li class="nav-item">
                  <router-link class="nav-link" to="/about">About</router-link>
                </li>
                <li class="nav-item">
                  <router-link class="nav-link" to="/contact">Contact</router-link>
                </li>
              </ul>
              
            </div>


          </div>
        </nav>
        
      </header>



      

      <router-view></router-view> 



      <!-------- Footer -------->
      <footer class="site-footer">
        <div class="container">
          <div class="row mb-5">
            <div class="col-md-4">
              <h3>About Us</h3>
              <p class="mb-4">
                <img src="{{ asset("images/person_testimonial_1.jpg") }}" alt="Image placeholder" class="img-fluid">
              </p>

              <p>Lorem ipsum dolor sit amet sa ksal sk sa, consectetur adipisicing elit. Ipsa harum inventore reiciendis.
            </div>
            <div class="col-md-6 ml-auto">
              <div class="row">
                <div class="col-md-7">
                  <h3>Latest Post</h3>
                  <div class="post-entry-sidebar">
                    <ul>
                      @foreach ( $posts as $post )
                        <li>
                          <router-link to="/post/{{$post->slug}}">
                            <img src="{{ asset("/images/posts/" . $post->img) }}" alt="Image placeholder" class="mr-4">
                            <div class="text">
                              <h4>{{ substr($post->body, 0, 40) . '...' }}</h4>
                              <div class="post-meta">
                                <span class="mr-2">{{$post->added_at}} </span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span> {{ $post-> comments_count}} </span>
                              </div>
                            </div>
                          </router-link>
                        </li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="col-md-1"></div>
                
                <div class="col-md-4">

                  <div class="mb-5">
                    <h3>Quick Links</h3>
                    <ul class="list-unstyled">
                      <li><router-link to="/"> Home </router-link></li>
                      <li><router-link to="/about"> About </router-link></li>
                      <li><router-link to="/contact"> Contact </router-link></li>
                    </ul>
                  </div>
                  
                  <div class="mb-5">
                    <h3>Social</h3>
                    <ul class="list-unstyled footer-social">
                      <li><a href="#"><span class="fa fa-twitter"></span> Twitter</a></li>
                      <li><a href="#"><span class="fa fa-facebook"></span> Facebook</a></li>
                      <li><a href="#"><span class="fa fa-instagram"></span> Instagram</a></li>
                      <li><a href="#"><span class="fa fa-vimeo"></span> Vimeo</a></li>
                      <li><a href="#"><span class="fa fa-youtube-play"></span> Youtube</a></li>
                      <li><a href="#"><span class="fa fa-snapchat"></span> Snapshot</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 text-center">
                <p class="small">
                    Copyright &copy; 2020 All Rights Reserved | This Blog is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="#" target="_blank" > AbdullRahman </a>
                </p>
            </div>
          </div>
        </div>
      </footer>

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