<template>
    <footer class="site-footer">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-4">
                    <h3>About Us</h3>
                    <p class="mb-4">
                        <img src="/images/person_testimonial_1.jpg" alt="Image placeholder" class="img-fluid">
                    </p>

                    <p>Lorem ipsum dolor sit amet sa ksal sk sa, consectetur adipisicing elit. Ipsa harum inventore reiciendis.</p>
                </div>
                <div class="col-md-6 ml-auto">
                    <div class="row">
                        <div class="col-md-7">
                        <h3>Latest Post</h3>
                        <div class="post-entry-sidebar">
                            <ul>
                                <li v-for="post in lastedPosts" :key="post.id">
                                    <router-link :to=" '/post/' + post.slug">
                                        <img :src=" '/images/posts/' + post.img" alt="Image placeholder" class="mr-4">
                                        <div class="text">
                                        <h4>{{post.body.substring(0, 40)  + '...' }}</h4>
                                        <div class="post-meta">
                                            <span class="mr-2">{{ post.added_at }} </span> &bullet;
                                            <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count}} </span>
                                        </div>
                                        </div>
                                    </router-link>
                                </li>
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
</template>


<script>
export default {
    data(){
        return{
            lastedPosts: {}
        }
    },
    mounted(){
        this.getFooterInfo();
    },
    methods:{
        getFooterInfo(){
            axios.get('/api/home-info')
            .then( 
                resquest => {  
                    // console.log(resquest.data); 
                    this.lastedPosts = resquest.data.lastedPosts
                }
            )
            .catch( error => console.log(error) )
        }
    }
}
</script>