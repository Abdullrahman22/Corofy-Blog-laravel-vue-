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

                        <!---- Dashboard Statistics Component --->
                        <statistics></statistics>

                        <div class="row">
                            <!----- Lasted Messages Component ----->
                            <div class="col-lg-6">
                                <lasted-messeges></lasted-messeges>
                            </div>
                            <!----- Lasted Comments Component ----->
                            <div class="col-lg-6">
                                <lasted-comments></lasted-comments>
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
    import Topbar from './../Topbar'
    import Statistics from './../Statistics'
    import LastedMesseges from './../LastedMesseges'
    import LastedComments from './../LastedComments'
    export default {
        components:{
            Statistics,
            Topbar,
            LastedMesseges,
            LastedComments,
        }
    }
</script>