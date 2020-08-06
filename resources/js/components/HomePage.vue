<template>
    <div id="home-page">

        <slider></slider>
        


        <section class="site-section py-sm">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                    <h2 class="mb-4">Latest Posts</h2>
                    </div>
                </div>
                <div class="row blog-entries">
                    <div class="col-md-12 col-lg-8 main-content">
                        <div class="row">
                            <div class="col-md-6" v-for="post in posts" >
                                asf
                            </div>
                        </div>

                        <!-- pagination Component -->
                        <pagination></pagination>


                    </div>

                    <!-- sidebar Component -->
                    <sidebar></sidebar>

                </div>
            </div>
        </section>


    </div>
</template>
<script>

    import Slider from './Slider'
    import Pagination from './Pagination'
    import Sidebar from './Sidebar'
    export default {
        components:{
            Sidebar,
            Slider,
            Pagination
        },
        data(){
            return{
                posts: {}
            }
        },
        mounted() {
            this.getPosts();
        },
        methods:{
            getPosts(){
                axios.get("/api/lastedPosts")
                // .then( resquest => console.log(resquest) )    
                .then( 
                    resquest => {  
                        this.posts = resquest.data   
                    }
                )
                .then( error => console.log(error) )
            },
        }
    }
    
</script>