<template>
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
                    <a href="" class="au-btn au-btn-load">load more</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LastedComments",
        data(){
            return{
                LastedComments: {},
            }
        },
        mounted(){
            this.getLastedComments();
        },
        methods:{
            getLastedComments(){
                axios.get("/api/admin/lasted-comments")
                .then( 
                    resquest => {  
                        this.LastedComments = resquest.data   
                        // console.log(resquest.data);
                    }
                )
                .then( error => console.log(error) )

            }
        }
    }
</script>