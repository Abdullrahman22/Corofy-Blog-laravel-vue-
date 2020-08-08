<template>
    <div id="category-page">



        <section class="site-section py-sm mt-4">
            <div class="container">
                <div class="row blog-entries">

                    <!------------ searching Posts ----------------->
                    <searching :searchVal="searchVal" v-if="searchVal"></searching>

                    <!------------ Category Posts ----------------->
                    <div class="col-md-12 col-lg-8 main-content" v-else >
                        <h4 class="mb-4 mt-4 category-title"> {{ categoryTitle() }} </h4>
                        <div class="row">
                            <div class="col-md-6" v-for="post in posts.data" :key="post.id" >
                                <router-link :to=" '/post/' + post.slug " class="blog-entry" data-animate-effect="fadeIn">
                                    <img :src=" '/images/' + post.img" alt="Image placeholder">
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

                        <!-- pagination Component -->
                        <pagination :data="posts" @pagination-change-page="getCategoryPosts" :limit="3" ></pagination>


                    </div>

                    <!-- sidebar Component -->
                    <sidebar></sidebar>

                </div>
            </div>
        </section>


    </div>
</template>
<script>

    import Sidebar from './Sidebar'
    import Searching from './Searching'
    export default {
        components:{
            Sidebar,
            Searching
        },
        data(){
            return{
                posts: {},
            }
        },
        computed: {
            searchVal: function() {
                return this.$store.state.searchVal;
            }
        },
        watch: {
            $route: function() {  // watch $route if any changes
                this.getCategoryPosts();
                this.categoryTitle();
            },
        },
        mounted() {
            this.getCategoryPosts();
        },
        methods:{
            getCategoryPosts( page = 1 ){
                axios.get('/api/category/' + this.$route.params.slug + '/posts?page=' + page)
                // .then( resquest => console.log( resquest.data.data ) )    
                .then( 
                    resquest => {  
                        this.posts = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .then( error => console.log(error) )
            },
            categoryTitle(){
                return this.$route.params.slug
            }
        }
    }
    
</script>