<template>

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

</template>

<script>
export default {
    name: "Statistics",
    data(){
        return{
            statistics: {},
        }
    },
    mounted(){
        this.getStatistics();
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
            .then( error => console.log(error) )

        }
    }
}
</script>