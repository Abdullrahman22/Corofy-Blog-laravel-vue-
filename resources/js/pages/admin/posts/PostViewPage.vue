<template>
    <div id="post-page">
        
        <!-- Page Container -->
        <div class="page-container">

            <!----- Topbar Header ----->
            <topbar></topbar>

            <!----- Main Content ----->
            <div class="main-content container">
                
                <div class="row blog-entries element-animate">

                    <!----------------- post-details ---------------------->
                    <div class="col-md-12 col-lg-10">
                        <!----------------- post-body ---------------------->
                        <div class="post-details">
                            <img :src=" '/images/posts/' + post.img " alt="Image" class="img-fluid mb-5">
                            <div class="post-meta">
                                <span class="mr-2"> {{ post.added_at }} </span> &bullet;
                                <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count }} </span>
                            </div>
                            <h1 class="mb-4">{{ post.title }}</h1>
                            <router-link class="category mb-5"  v-if="post.category" :to=" '/category/' + post.category.slug ">  {{ post.category.title }}  </router-link>
                            <div class="post-content-body">
                                <p>{{post.body}}</p>
                            </div>
                        </div>
                        <!----------------- Comments ---------------------->
                        <div class="comments-section" v-if=" post.comments_count > 0 ">
                            <div class="pt-5">
                                <h3 class="mb-5 comments-header"> {{ post.comments_count }}  Comments</h3>
                                <hr>
                            </div>
                            <ul class="comment-list">
                                <li class="comment" v-for="comment in comments" :key="comment.id">
                                    <div class="vcard">
                                        <img :src=" '/images/users/' + comment.user.img " alt="Image placeholder">
                                        </div>
                                        <div class="comment-body">
                                        <h3> {{ comment.user.name }} </h3>
                                        <div class="meta"> {{ comment.added_at }} </div>
                                        <p> {{ comment.body }}  </p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        
                        
                    </div>

                </div>

            </div>
            <!----- End Main Content ----->

        </div>
        <!----- End Page Container ----->


    </div>
</template>

<script>
    import Topbar from './../../../components/admin/Topbar'

    export default {
        components:{
            Topbar,
        },
        props: ["id"] ,
        data(){
            return{
                post: {},
                comments: {}
            }
        },
        mounted() {
            this.getPost();
        },
        methods:{
            getPost(){
                axios.get('/api/admin/posts/' + this.$route.params.id) // start link( (/) -> to start link from begianing) 
                // .then( resquest => console.log( resquest.data ) )    
                .then( 
                    resquest => {  
                        this.post = resquest.data 
                        this.comments = resquest.data.comments 
                    }
                )
                .then( error => console.log(error) )
            },
        }

    }
</script>