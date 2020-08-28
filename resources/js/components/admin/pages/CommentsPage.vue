<template>
    <div class="comment-page">
        
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
                                        <th>Comment</th>
                                        <th>User</th>
                                        <th>Created at</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" comment in comments.data " :key="comment.id">
                                        <td> #{{ comment.id }} </td>
                                        <td> {{ comment.body.substring(0, 30)  + '...' }} </td>
                                        <td> <img :src=" '/images/users/' + comment.user.img " alt="user-img" class="user-img" > </td>
                                        <td> {{ comment.added_at }} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-placement="top" title="Show" data-original-title="Show" data-toggle="modal" data-target="#commentModel" @click="showComment(comment)">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" @click="deleteComment(comment)">
                                                    <i class="zmdi zmdi-delete"></i>
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

                <div class="pagination-container">
                    <!-- pagination Component -->
                    <pagination :data="comments" @pagination-change-page="getComments" :limit="1" ></pagination>
                </div>

            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->


        <!----- Comment Model ----->
        <div class="modal fade" id="commentModel" tabindex="-1" role="dialog" aria-labelledby="commentModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="commentModelLabel"> Show Comment </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!----------------- Comments ---------------------->
                        <ul class="comment-list" >
                            <li class="comment">
                                <div class="vcard">
                                    <img v-if="comment.user" :src=" '/images/users/' + comment.user.img " alt="Image placeholder">
                                </div>
                                <div class="comment-body">
                                    <h3 v-if="comment.user" > {{ comment.user.name }} </h3>
                                    <div class="meta"> {{ comment.added_at }} </div>
                                    <p> {{ comment.body }}  </p>
                                </div>
                            </li>
                        </ul>
                        <!------ Buttons ------>
                        <div class="buttons float-right">
                            <button type="submit" class="btn btn-danger" @click="deleteComment(comment)">  Delete  </button>
                            <button class="btn btn-info" data-dismiss="modal"> Close </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!----- End Post Model ----->






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
                comments:{},
                comment: {}
            }
        },
        watch: {
            comment(){
                return this.comment
            }
        },
        mounted(){
            this.getComments();
        },
        methods:{
            getComments( page = 1 ){
                axios.get('/api/admin/comments?page=' + page)  
                .then( 
                    resquest => {  
                        this.comments = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            showComment(comment){
                axios.get('/api/admin/comments/' + comment.id )  
                .then( 
                    resquest => {  
                        this.comment = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            deleteComment(comment){

                Vue.swal({

                    text: 'Are you sure delete this Comment ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {
                    if (result.value) {

                        // do delete response
                        axios.delete("/api/admin/comments/" + comment.id  )
                        .then( 
                            response => {  // if there success request 
                                if( response.data.status == "deleted" ){
                                    $("#commentModel").modal('hide');  // close Model
                                    $(".modal-backdrop.fade.show").remove();
                                    this.getComments();    // reload getPosts()
                                    this.comment = {}      // empty post var
                                    /*======== Sweet Alert ============*/
                                    Vue.swal({
                                        position: 'top-end',
                                        icon: 'success',
                                        text: 'Comment Deleted Successfully',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                                }
                            }
                        )
                        .catch( error => console.log(error) ); 

                    }
                })
            }

        },
    }
</script>