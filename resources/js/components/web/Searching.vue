<template>
    <div class="col-md-12 col-lg-8 searching-posts">
        
        <h2 class="mb-4">Searching Resulte: </h2>

        <div class="posts-resulte row" v-if=" posts.length > 0  ">
            <div class="col-md-6" v-for="post in posts" :key="post.id" >
                <router-link :to=" '/post/' + post.slug " class="blog-entry" data-animate-effect="fadeIn">
                    <img :src=" '/images/posts/' + post.img" alt="Image placeholder">
                    <div class="blog-content-body">
                        <div class="post-meta">
                            <span class="mr-2"> {{ post.added_at }}  </span> &bullet;
                            <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count }} </span>
                        </div>
                        <h2>{{post.body.substring(0, 40)  + '...' }}</h2>
                    </div>
                </router-link>
            </div>
        </div>
        
        <div class="no-resultes text-center" v-else>
            <img src="/images/not_found.png" alt="Not Found">
            <p class="text-center "> No Posts Found!</p>
        </div>


    </div>
</template>

<script>
    export default {
        name: "Searching",
        props:["searchVal"],
        data(){
            return{
                posts: {}
            }
        },
        mounted(){

        },
        watch:{
            searchVal(){
                if( this.searchVal.length > 0 ){
                    axios.get("/api/search/posts/" + this.searchVal )
                    .then( 
                        resquest => {  
                            this.posts = resquest.data 
                            console.log( resquest.data )   
                        }
                    )
                    .then( error => console.log(error) )
                }
            }
        }
    }
</script>