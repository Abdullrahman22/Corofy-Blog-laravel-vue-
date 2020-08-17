<template>
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
                        <h5 class="task">
                            <router-link :to=" '/admin/messeges/' + messege.id "> {{messege.body.substring(0, 40)  + '...' }} </router-link>
                        </h5>
                        <span class="time">{{ messege.added_at }}</span>
                    </div>
                </div>
                
            </div>
            <div class="au-task__footer">
                <router-link to='/admin/messeges' class="au-btn au-btn-load " >load more</router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "LastedMesseges",
        data(){
            return{
                LastedMesseges: {},
            }
        },
        mounted(){
            this.getLastedMesseges();
        },
        methods:{
            getLastedMesseges(){
                axios.get("/api/admin/lasted-messeges")
                .then( 
                    resquest => {  
                        this.LastedMesseges = resquest.data   
                        // console.log(resquest.data);
                    }
                )
                .then( error => console.log(error) )

            }
        }
    }
</script>