<template>
    <div class="dashboard-page">
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <topbar></topbar>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <!-- DATA TABLE-->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>#ID</th>
                                        <th>username</th>
                                        <th>img</th>
                                        <th>@email</th>
                                        <th>Status</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" user in users.data " :key="user.id">
                                        <td> #{{ user.id }} </td>
                                        <td> {{ user.name }} </td>
                                        <td> <img :src=" '/images/users/' + user.img " alt="user-img" class="user-img" > </td>
                                        <td> {{ user.email }} </td>
                                        <td>
                                            <!-- <div class="bg-success p-1 text-white rounded">
                                                <span> Allowed </span>
                                            </div>  -->
                                            <div class="bg-danger p-1 text-white rounded">
                                                <span> Blocked </span>
                                            </div> 
                                        </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete">
                                                    <i class="zmdi zmdi-lock-open"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- END DATA TABLE-->


                    </div>
                </div>

                <div class="text-center">
                    <!-- pagination Component -->
                    <pagination :data="users" @pagination-change-page="getUsers" :limit="1" ></pagination>
                </div>

            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
</template>
<script>
    import Topbar from './../components/Topbar'

    export default {
        components:{
            Topbar,
        },
        data(){
            return{
                users:{}
            }
        },
        mounted(){
            this.getUsers();
        },
        methods:{
            getUsers( page = 1 ){
                axios.get('/api/admin/users?page=' + page)  
                .then( 
                    resquest => {  
                        this.users = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .then( error => console.log(error) )
            }
        }
    }
</script>