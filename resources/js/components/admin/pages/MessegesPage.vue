<template>
    <div class="messeges-page">
        
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
                                        <th>Messege</th>
                                        <th>email</th>
                                        <th>Created at</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" messege in messeges.data " :key="messege.id">
                                        <td> #{{ messege.id }} </td>
                                        <td> {{ messege.body.substring(0, 20)  + '...' }} </td>
                                        <td> {{ messege.email.substring(0, 20)  + '...'  }} </td>
                                        <td> {{ messege.added_at }} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-placement="top" title="Show" data-original-title="Show" data-toggle="modal" data-target="#messegeModel" @click="showMessege(messege)">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" @click="deleteMessege(messege)">
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
                    <pagination :data="messeges" @pagination-change-page="getMesseges" :limit="1" ></pagination>
                </div>

            </div>
            <!-- END MAIN CONTENT-->
        </div>
        <!-- END PAGE CONTAINER-->


        <!----- Messege Model ----->
        <div class="modal fade" id="messegeModel" tabindex="-1" role="dialog" aria-labelledby="messegeModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="messegeModelLabel"> The Messege </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!----------------- Messeges ---------------------->
                        <ul class="messege-list" >
                            <li class="messege">
                                <p>  <u class=" h5"> @Email:</u>  {{ messege.email }}   </p>
                                <hr>
                                <p> <u class=" h5"> ender Name:</u> {{ messege.name }} </p>
                                <hr>
                                <p> <u class=" h5"> Sender Phone:</u> {{ messege.phone }} </p>
                                <hr>
                                <p> <u class=" h5"> Messege:</u> {{ messege.body }} </p>
                            </li>
                        </ul>
                        <!------ Buttons ------>
                        <div class="buttons float-right">
                            <button type="submit" class="btn btn-danger" @click="deleteMessege(messege)">  Delete  </button>
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
                messeges:{},
                messege: {}
            }
        },
        mounted(){
            this.getMesseges();
        },
        methods:{
            getMesseges( page = 1 ){
                axios.get('/api/admin/messeges?page=' + page)  
                .then( 
                    resquest => {  
                        this.messeges = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            showMessege(messege){
                axios.get('/api/admin/messeges/' + messege.id )  
                .then( 
                    resquest => {  
                        this.messege = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            deleteMessege(messege){

                Vue.swal({

                    text: 'Are you sure delete this Messege ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {
                    if (result.value) {

                        // do delete response
                        axios.delete("/api/admin/messeges/" + messege.id  )
                        .then( 
                            response => {  // if there success request 
                                if( response.data.status == "deleted" ){
                                    $("#messegeModel").modal('hide');  // close Model
                                    $(".modal-backdrop.fade.show").remove();
                                    this.getMesseges();    // reload getPosts()
                                    this.post = {}      // empty post var
                                    /*======== Sweet Alert ============*/
                                    Vue.swal({
                                        position: 'top-end',
                                        icon: 'success',
                                        text: 'Post Deleted Successfully',
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