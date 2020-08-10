<template>
    <div class="col-md-12 col-lg-4 sidebar">

        <!---- search-form --->
        <div class="sidebar-box search-form-wrap">
            <form class="search-form" @submit.prevent="searchNow" disabled>
                <div class="form-group">
                    <span class="icon fa fa-search" @click.prevent="searchNow" ></span>
                    <input type="text" class="form-control" id="search-posts" placeholder="Search Posts....." v-model="queryVal" >
                </div>
            </form>
        </div>

        <!-- Popular Posts -->  
        <div class="sidebar-box">
            <h3 class="heading">Popular Posts</h3>
            <div class="post-entry-sidebar">
                <ul v-if=" posts.length > 0 ">
                    <li v-for="post in posts.slice(3,6)" :key="post.id">
                        <router-link :to=" '/post/' + post.slug ">
                            <img :src=" '/images/posts/' + post.img " alt="Image placeholder" class="mr-4">
                            <div class="text">
                                <h4>{{ post.title }}</h4>
                                <div class="post-meta">
                                <span class="mr-2"> {{post.added_at}}  </span>
                                </div>
                            </div>
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Categories -->  
        <div class="sidebar-box">
            <h3 class="heading">Categories</h3>
            <ul class="categories">
                <li v-for=" category in categories " :key="category.id" >
                    <router-link :to=" '/category/' + category.slug ">
                        {{ category.title }} <span>( {{ category.posts_count }} )</span>
                    </router-link>
                </li>
            </ul>
        </div>

        <!-- Tages -->  
        <div class="sidebar-box">
            <h3 class="heading">Tags</h3>
            <ul class="tags">
                <li v-for=" category in categories " :key="category.id">
                    <router-link :to=" '/category/' + category.slug "> {{ category.title }} </router-link>
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
            queryVal: ''  // 
        }
    },
    mounted() {
        this.getPosts() ;
        this.getCategories() ;
        this.emptySearchVal() ;  // for empty searchVal at reload
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
        emptySearchVal(){
            this.$store.commit('updateSearchVal', '')
        },
        searchNow(){
            this.$store.commit('updateSearchVal', this.queryVal) // qual $store.state.searchVal ==  this.queryVal
        }
    } 
}
</script>

