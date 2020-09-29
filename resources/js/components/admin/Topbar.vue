<template>
    <header class="header-desktop">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-button" style=" margin-left: auto;">
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu" :class="{ 'show-dropdown' : dropdownMenu}"  @click="addClassDropdownMenu"  >
                                <div class="image">
                                    <img src="/admin_assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                </div>
                                <div class="content">
                                    <p> 
                                        {{ admin_info.name }}
                                        <i class="fas fa-chevron-down" ></i>
                                    </p>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <span>
                                                <img src="/admin_assets/images/icon/avatar-01.jpg" alt="John Doe" />
                                            </span>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <span>{{ admin_info.name }}</span>
                                            </h5>
                                            <span class="email">{{ admin_info.email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__body">
                                        <div class="account-dropdown__item">
                                            <router-link to="/admin/account">
                                                <i class="zmdi zmdi-account"></i>
                                                Account
                                            </router-link>
                                        </div>
                                        <div class="account-dropdown__item">
                                            <router-link to="/admin/setting">
                                                <i class="zmdi zmdi-settings"></i>
                                                Setting
                                            </router-link>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="/auth/admin/logout">
                                            <i class="zmdi zmdi-power"></i>
                                            Logout
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>

<script>
    export default {
        name: 'Topbar',
        data(){
            return{
                dropdownMenu: false ,
                admin_info: {}
            }
        },
        mounted(){
            this.getAdminPanalInfo();
        },
        methods:{
            addClassDropdownMenu(){
                this.dropdownMenu =! this.dropdownMenu
            },
            getAdminPanalInfo(){
                axios.get("/api/admin/admin-panal-info")
                .then( 
                    resquest => {  
                        console.log(resquest.data);
                        this.admin_info = resquest.data.admin_info
                    }
                )
            .catch( error => console.log(error) )
        }
        }
    }
</script>