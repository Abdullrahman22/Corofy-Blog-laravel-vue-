<template>
    <div id="post-page">

        <section class="site-section py-lg">
            <div class="container">
                    
                <div class="row blog-entries element-animate">

                    <!------------ searching Posts ----------------->
                    <searching :searchVal="searchVal" v-if="searchVal"></searching>

                    <!----------------- post-details ---------------------->
                    <div class="col-md-12 col-lg-8 main-content" v-else >
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
                        <!----------------- Type Comment ---------------------->
                        <div class="comment-form-wrap pt-5">
                            <h3 class="mb-5">Leave a comment</h3>
                            <form action="#" class="p-5 bg-light">
                                

                                <div class="form-group">
                                    <label for="message">Comment</label>
                                    <textarea name="" id="message" cols="30" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" value="Post Comment" class="btn btn-primary">
                                </div>

                            </form>
                        </div>
                    </div>

                    <!--------------Sidebar----------->
                    <sidebar></sidebar>

                </div>
            </div>
        </section>

        <!--------- Related Posts ----------->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2 class="mb-3 ">Related Post</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-4" v-for="post in relatedPosts" :key="post.id">
                        <router-link :to=" '/post/' + post.slug " class="a-block sm d-flex align-items-center height-md" :style=" 'background-image: url(\' /images/posts/'+ post.img  +'  \')' ">
                            <div class="text">
                                <div class="post-meta">
                                    <span class="category"> {{ post.category_title }} </span>
                                    <span class="mr-2">  {{ post.added_at }}  </span> 
                                    <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count }} </span>
                                </div>
                                <h3> {{ post.title }} </h3>
                            </div>
                        </router-link>
                    </div>
                </div>
            </div>


        </section>

    </div>
</template>

<script>

    import Sidebar from './../components/Sidebar'
    import Searching from './../components/Searching'

    export default {
        components:{
            Sidebar,
            Searching
        },
        data(){
            return{
                post: {},
                comments: {},
                relatedPosts: {}
            }
        },
        computed: {
            searchVal: function() {
                return this.$store.state.searchVal;
            }
        },
        watch: {
            $route: function() {  // watch $route if any changes
                this.getPost();
            }
        },
        mounted() {
            this.getPost();
            this.getRelatedPosts();
            // console.log( this.$route );  // console $route for test
        },
        methods:{
            getPost(){
                axios.get('/api/post/' + this.$route.params.slug) // start link( (/) -> to start link from begianing) 
                // .then( resquest => console.log( resquest.data ) )    
                .then( 
                    resquest => {  
                        this.post = resquest.data 
                        this.comments = resquest.data.comments 
                    }
                )
                .then( error => console.log(error) )
            },
            getRelatedPosts(){
                axios.get("/api/category/post/" + this.$route.params.slug)
                .then( 
                    resquest => {  
                        this.relatedPosts = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .then( error => console.log(error) )

            }
        }
    }
</script>