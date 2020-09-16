<template>
    <header role="banner">

        <!--------Topbar---------->
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
                    <div class="col-6 register-links" style="color: #fff">
                        <a href="#" data-toggle="modal" data-target="#loginModal" >Login</a>
                        /
                        <a href="#" data-toggle="modal" data-target="#signUpModal" >SignUp</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container logo-wrap">
            <div class="row pt-5">
                <div class="col-12 text-center">
                    <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
                    <h1 class="site-logo"><router-link to="/">  {{ site_name }}  </router-link></h1>
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
                            <router-link v-for="category in categories" :key="category.id" class="dropdown-item" :to=" '/category/' + category.slug ">  {{ category.title }} </router-link>
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
</template>

<script>
export default {
    data(){
        return{
            site_name: '',
            categories: {}
        }
    },
    mounted(){
        this.getHeaderInfo();
    },
    methods:{
        getHeaderInfo(){
            axios.get('/api/home-info')
            .then( 
                resquest => {  
                    // console.log(resquest.data); 
                    this.site_name = resquest.data.site_name
                    this.categories = resquest.data.categories
                }
            )
            .catch( error => console.log(error) )
        }
    }
}
</script>