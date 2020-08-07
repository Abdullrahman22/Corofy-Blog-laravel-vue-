<template>
    <div class="col-md-12 col-lg-4 sidebar">

        <!---- search-form --->
        <div class="sidebar-box search-form-wrap">
            <form action="#" class="search-form">
                <div class="form-group">
                    <span class="icon fa fa-search"></span>
                    <input type="text" class="form-control" id="s" placeholder="Search Posts.....">
                </div>
            </form>
        </div>

        <!-- Popular Posts -->  
        <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
                <ul v-if=" posts.length > 0 ">
                    <li v-for="post in posts.slice(3,6)" :key="post.id">
                        <a :href=" '/post/' + post.slug ">
                            <img :src=" '/images/' + post.img " alt="Image placeholder" class="mr-4">
                            <div class="text">
                                <h4>{{ post.title }}</h4>
                                <div class="post-meta">
                                <span class="mr-2"> {{post.added_at}}  </span>
                                </div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Categories -->  
        <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
                <li v-for=" category in categories " :key="category.id" >
                    <a :href=" '/category/' + category.slug ">
                        {{ category.title }} <span>( {{ category.posts_count }} )</span>
                    </a>
                </li>
            </ul>
        </div>

        <!-- Tages -->  
        <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
                <li v-for=" category in categories " :key="category.id">
                    <a :href=" '/category/' + category.slug "> {{ category.title }} </a>
                </li>
            </ul>
        </div>

    </div>
</template>

<script>
export default {
    name: "Sidebar",
    data(){
        return{
            posts: {},
            categories: {},
        }
    },
    mounted() {
        this.getPosts() ;
        this.getCategories() ;
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
        getCategories(){
            axios.get("/api/allCategories")
            // .then( resquest => console.log(resquest) )    
            .then( 
                resquest => {  
                    this.categories = resquest.data   
                }
            )
            .then( error => console.log(error) )
        },
    } 
}
</script>

