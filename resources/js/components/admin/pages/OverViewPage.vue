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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">overview</h2>
                                </div>
                            </div>
                        </div>

                        <!---- Dashboard Statistics  --->
                        <div class="statistics row m-t-25">

                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-account-o"></i>
                                            </div>
                                            <div class="text">
                                                <h2> {{ statistics.users_count }} </h2>
                                                <span>Users</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="far fa-clipboard"></i>
                                            </div>
                                            <div class="text">
                                                <h2> {{ statistics.posts_count }} </h2>
                                                <span>Posts</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c3">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-comment-text"></i>
                                            </div>
                                            <div class="text">
                                                <h2> {{ statistics.comments_count }} </h2>
                                                <span>Comments</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="far fa-envelope"></i>
                                            </div>
                                            <div class="text">
                                                <h2> {{ statistics.messeges_count }} </h2>
                                                <span>total Messeges</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <!----- Lasted Messages Component ----->
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="far fa-envelope"></i>
                                            Lasted Messeges
                                        </h3>
                                    </div>
                                    <div class="au-task js-list-load">
                                        <div class="au-task-list js-scrollbar3">

                                            <div class="au-task__item au-task__item--danger" v-for=" messege in LastedMesseges " :key="messege.id">
                                                <div class="au-task__item-inner">
                                                    <p class="task">
                                                        {{messege.body.substring(0, 40)  + '...' }}
                                                    </p>
                                                    <span class="time">{{ messege.added_at }}</span>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        <div class="au-task__footer">
                                            <router-link to='/admin/messeges' class="au-btn au-btn-load " >load more</router-link>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!----- Lasted Comments Component ----->
                            <div class="col-lg-6">
                                <div class="au-card au-card--no-shadow au-card--no-pad m-b-40">
                                    <div class="au-card-title" style="background-image:url('images/bg-title-02.jpg');">
                                        <div class="bg-overlay bg-overlay--blue"></div>
                                        <h3>
                                            <i class="zmdi zmdi-comment-text"></i>
                                            Lasted Comments
                                        </h3>
                                    </div>
                                    <div class="au-inbox-wrap js-inbox-wrap">
                                        <div class="au-message js-list-load">
                                            <div class="au-message-list">

                                                <div class="au-message__item unread" v-for=" comment in LastedComments " :key="comment.id">
                                                    <div class="au-message__item-inner">
                                                        <div class="au-message__item-text">
                                                            <div class="avatar-wrap">
                                                                <div class="avatar">
                                                                    <img :src=" '/images/users/' + comment.user.img " alt="John Smith">
                                                                </div>
                                                            </div>
                                                            <div class="text">
                                                                <h5 class="name">{{ comment.user.name }}</h5>
                                                                <p>{{comment.body.substring(0, 20)  + '...' }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="au-message__item-time">
                                                            <span>{{ comment.added_at }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="au-message__footer">
                                                <router-link to="/admin/comments" class="au-btn au-btn-load">load more</router-link>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    Copyright &copy; 2020 All Rights Reserved | This Blog is made with <i class="fa fa-heart text-danger" aria-hidden="true"></i> by <a href="#" target="_blank" > AbdullRahman </a>
                                </div>
                            </div>
                        </div>

                    </div>
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
            Topbar
        },
        data(){
            return{
                statistics: {},
                LastedMesseges: {},
                LastedComments: {},
            }
        },
        mounted(){
            this.getStatistics();
            this.getLastedMesseges();
            this.getLastedComments();
        },
        methods:{
            getStatistics(){
                axios.get("/api/admin/statistics")
                .then( 
                    resquest => {  
                        this.statistics = resquest.data   
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            getLastedMesseges(){
                axios.get("/api/admin/lasted-messeges")
                .then( 
                    resquest => {  
                        this.LastedMesseges = resquest.data   
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )

            },
            getLastedComments(){
                axios.get("/api/admin/lasted-comments")
                .then( 
                    resquest => {  
                        this.LastedComments = resquest.data   
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            }
        }
    }
</script>