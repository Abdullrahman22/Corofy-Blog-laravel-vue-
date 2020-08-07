<template>

    <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

                <div v-if="posts.length > 0">
                
                    <carousel
                        :loop="true" :autoplay="true"
                        :margin="10" :animateOut="'fadeOut'" 
                        :animateIn="'fadeIn'" :nav="true" 
                        :autoplayHoverPause="true" :items="1" 
                        :navText="['<span class=\'ion-chevron-left\'></span>','<span class=\'ion-chevron-right\'></span>']"
                        :responsive="{0:{ items:1, nav:false } , 600:{ items:1, nav:false }, 1000:{ items:1, nav:true }}"
                    >

                        <div   v-for="post in posts.slice(0, 3) " :key="post.id"> 
                            <a :href=" '/post/'+ post.slug " class="a-block d-flex align-items-center height-lg" :style=" 'background-image: url(\' /images/'+ post.img  +'  \')' ">
                                <div class="text half-to-full">
                                    <span class="category mb-5"> {{ post.category.title }} </span>
                                    <div class="post-meta">
                                        <span class="mr-2"> {{post.added_at}} </span> &bullet;
                                        <span class="ml-2"><span class="fa fa-comments"></span> {{ post.comments_count  }} </span>
                                    </div>
                                    <h3> {{post.title}} </h3>
                                    <p> {{post.body.substring(0, 100)  + '...' }} </p>
                                </div>
                            </a>
                        </div>


                    </carousel>
                </div>
            </div>
          </div>
          
        </div>


      </section>

</template>

<script>

    import carousel from 'vue-owl-carousel'

    export default {
        components: { carousel },
        name: "Slider",
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
                axios.get("/api/randPosts")
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
