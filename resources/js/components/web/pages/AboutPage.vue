<template>
    <div id="about-page">
        
        <section class="site-section pt-5">
            <div class="container">
                
                <div class="row blog-entries">

                    <!------------ searching Posts ----------------->
                    <searching :searchVal="searchVal" v-if="searchVal"></searching>

                    <!------------ About Content ----------------->
                    <div class="col-md-12 col-lg-8 main-content" v-else>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="mb-4">Hi There! I'm Craig David</h2>
                                <p class="mb-5"><img src="/images/about_img.jpg" alt="Image placeholder" class="img-fluid"></p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum minima eveniet recusandae suscipit eum laboriosam fugit amet deleniti iste et. Ad dolores, necessitatibus non saepe tenetur impedit commodi quibusdam natus repellat, exercitationem accusantium perferendis officiis. Laboriosam impedit quia minus pariatur!</p>
                                <p>Dignissimos iste consectetur, nemo magnam nulla suscipit eius quibusdam, quo aperiam quia quae est explicabo nostrum ab aliquid vitae obcaecati tenetur beatae animi fugiat officia id ipsam sint? Obcaecati ea nisi fugit assumenda error totam molestiae saepe fugiat officiis quam?</p>
                                <p>Culpa porro quod doloribus dolore sint. Distinctio facilis ullam voluptas nemo voluptatum saepe repudiandae adipisci officiis, explicabo eaque itaque sed necessitatibus, fuga, ea eius et aliquam dignissimos repellendus impedit pariatur voluptates. Dicta perferendis assumenda, nihil placeat, illum quibusdam. Vel, incidunt?</p>
                                <p>Dolorum blanditiis illum quo quaerat, possimus praesentium perferendis! Quod autem optio nobis, placeat officiis dolorem praesentium odit. Vel, cum, a. Adipisci eligendi eaque laudantium dicta tenetur quod, pariatur sunt sed natus officia fuga accusamus reprehenderit ratione, provident possimus ut voluptatum.</p>
                            </div>
                        </div>

                        <div class="row mb-5 mt-5">
                            <div class="col-md-12 mb-5">
                                <h2>My Latest Posts</h2>
                            </div>
                            <!-------------------- Post ---------------------->
                            <div class="col-md-12" >
                                <div class="post-entry-horzontal" v-for="post in posts" :key="post.id">
                                    <a :href=" '/post/' + post.slug " style="width: 100%;">
                                        <div class="image" :style=" 'background-image: url(\' /images/posts/'+ post.img  +'  \')' "></div>
                                        <span class="text">
                                            <div class="post-meta">
                                                <span class="mr-2"> {{ post.added_at }} </span> &bullet;
                                                <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count }} </span>
                                            </div>
                                            <h1>{{ post.title }} </h1>
                                        </span>
                                    </a>
                                </div>

                            </div>
                        </div>


                    </div>

                    <!-- sidebar Component -->
                    <sidebar></sidebar>

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
            Searching,
        },
        data(){
            return{
                posts: {}
            }
        },
        computed: {
            searchVal: function() {
                return this.$store.state.searchVal;
            }
        },
        mounted() {
            this.getLatestPosts();
        },
        methods:{
            getLatestPosts(){
                axios.get('api/lastedPosts')
                // .then( resquest => console.log( resquest.data.data ) )    
                .then( 
                    resquest => {  
                        this.posts = resquest.data.data 
                    }
                )
                .then( error => console.log(error) )
            },
        }
    }
    
</script>