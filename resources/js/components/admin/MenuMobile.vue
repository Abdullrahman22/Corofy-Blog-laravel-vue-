<template>
         <!-- HEADER MOBILE -->
    <header class="header-mobile d-block d-lg-none">
        <div class="header-mobile__bar">
            <div class="container-fluid">
                <div class="header-mobile-inner">
                    <a class="logo" href="../../">
                        <h4> {{ site_name }} </h4>
                    </a>
                    <button class="hamburger hamburger--slider" type="button">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <nav class="navbar-mobile">
            <div class="container-fluid">
                <ul class="navbar-mobile__list list-unstyled">
                    <li>
                        <router-link to="/admin/overview">
                            <i class="fas fa-tachometer-alt"></i>
                            Dashboard
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/users">
                            <i class="fas fa-users"></i>
                            Users
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/categories">
                            <i class="fas fa-sitemap"></i>
                            Categories
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/posts">
                            <i class="far fa-clipboard"></i>
                            Posts
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/comments">
                            <i class="zmdi zmdi-comment-text"></i>
                            Comments
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/messeges">
                            <i class="far fa-envelope"></i>
                            Messeges
                        </router-link>
                    </li>
                    <li>
                        <router-link to="/admin/setting">
                            <i class="fas fa-cog"></i>
                            Setting
                        </router-link>
                    </li>
                </ul>
            </div>
        </nav>
     </header>
</template>
<script>
export default {
    data(){
        return{
            site_name: {}
        }
    },
    mounted(){
        this.getSiteName();
    },
    methods:{
        getSiteName(){
            axios.get("/api/admin/admin-panal-info")
            .then( 
                resquest => {  
                    // console.log(resquest.data);
                    this.site_name = resquest.data.site_name
                }
            )
            .catch( error => console.log(error) )
        }
    }
}
</script>