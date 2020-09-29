<template>
     <!-- MENU SIDEBAR-->
     <aside class="menu-sidebar d-none d-lg-block">
        <div class="logo-div">
            <a class="custom-logo" href="../../">
                <h2> {{ site_name }} </h2>
            </a>
        </div>
        <div class="menu-sidebar__content js-scrollbar1">
            <nav class="navbar-sidebar">
                <ul class="list-unstyled navbar__list">
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
            </nav>
        </div>
     </aside>
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