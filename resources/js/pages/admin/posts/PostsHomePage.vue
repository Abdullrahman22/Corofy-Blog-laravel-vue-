<template>
    <div id="post-page">
        
        <!-- Page Container -->
        <div class="page-container">

            <!----- Topbar Header ----->
            <topbar></topbar>

            <!----- Main Content ----->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="table-header">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>
                                Posts data
                            </h3>
                            <button class="au-btn-plus float-right" data-toggle="modal" data-target="#postModel"  @click="setEditFalse">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>

                        <!----- Table Data ----->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>img</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" post in posts.data " :key="post.id"  >
                                        <td> #{{ post.id }} </td>
                                        <td>
                                            <img :src=" '/images/posts/' + post.img " class="img-post" alt="img-post">
                                        </td>
                                        <td> {{ post.title }} </td>
                                        <td> {{ post.added_at }} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <router-link :to=" '/admin/posts/' + post.id " class="item" data-toggle="tooltip" data-placement="top" title="Show" data-original-title="Show">
                                                    <i class="zmdi zmdi-eye"></i>
                                                </router-link>
                                                <button class="item" data-placement="top" title="Edit" data-original-title="Edit" data-toggle="modal" data-target="#postModel" @click="setEditTrue(post)" >
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" @click="deletePost(post)">
                                                    <i class="zmdi zmdi-delete"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!----- End Table Data ----->

                    </div>
                </div>

                <div class="pagination-container">
                    <!-- pagination Component -->
                    <pagination :data="posts" @pagination-change-page="getPosts" :limit="1" ></pagination>
                </div>

            </div>
            <!----- End Main Content ----->

        </div>
        <!----- End Page Container ----->


        <!----- Post Model ----->
        <div class="modal fade" id="postModel" tabindex="-1" role="dialog" aria-labelledby="postModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="postModelLabel"> {{ edit ? 'Edit Post' : 'Add Post'}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent=" edit ? updatePost() :  createPost() "  enctype="multipart/form-data"  >
                            <!------ Post CSRF token ------>
                            <input type="hidden" name="_token" :value="post.csrf">
                            <!------ Post Title ------>
                            <div class="form-group">
                                <label for="post-title"> Post Title: </label>
                                <input type="text" id="post-title" class="form-control" name="title" placeholder="Type Post Title..." v-model="post.title">
                                <small class="text-danger" v-if="errors.title"> {{errors.title[0] }} </small> 
                            </div>
                            <!------ Post Image ------>
                            <div class="form-group upload-input">
                                <p> Post Image: &nbsp; &nbsp; <img :src=" '/images/posts/' + post.img " class="img-post" alt="img-post"  v-if="edit" > </p>
                                <label for="post-img" >  <i class="fas fa-cloud-upload-alt"></i> &nbsp; <span> Choose image... </span> </label> 
                                <input type="file" id="post-img" class="form-control custom-file-input " name="img" @change="getImageName($event)">
                                <small class="text-danger" v-if="errors.img"> {{errors.img[0] }} </small> 
                            </div>
                            <!------ Post Category ------>
                            <div class="form-group">
                                <label for="post-category"> Post Category: </label>
                                <select name="category_id" id="post-category" class="form-control" v-model=" post.category_id ">
                                    <option value="" selected > Choose Category </option> 
                                    <option v-for=" category in categories.data " :key="category.id" :value="category.id" > {{ category.title }} </option>
                                </select>
                                <small class="text-danger" v-if="errors.category_id"> {{errors.category_id[0] }} </small> 
                            </div>
                            <!------ Post Body ------>
                            <div class="form-group">
                                <label for="post-body"> Post Body: </label>
                                <textarea id="post-body" class="form-control" rows="8"  name="body" placeholder="Type Post Body..." v-model="post.body"><textarea></textarea>
                                <small class="text-danger" v-if="errors.body"> {{errors.body[0] }} </small> 
                            </div>
                            <!------ Buttons ------>
                            <div class="buttons float-right">
                                <button class="btn btn-info " data-dismiss="modal"> Close </button>
                                <button type="submit" class="btn btn-primary ">  {{ edit ? 'Edit' : 'Save'}}  </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!----- End Post Model ----->


    </div>
</template>
<script>
    import Topbar from './../../../components/admin/Topbar'

    export default {
        components:{
            Topbar,
        },
        data(){
            return{
                categories:{}, // create empty object to insert categories in it to loop 
                posts:{}, // create empty object to insert posts in it to loop 
                post:{},
                postUpdated:{},
                errors: {}, // create empty object to insert errors in it to show 
                edit : false // set this var to know if modal for create or edit
            }
        },
        mounted(){
            this.getPosts();
            this.getCategories();
        },
        methods:{




            getImageName( event ){  // at change input set post img name
                console.log( event.target.files[0].name  ); // get info for file ( name , size , type..... )
                var fileReader = new FileReader() 
                fileReader.readAsDataURL( event.target.files[0] )
                fileReader.onload = (e) => {
                    this.post.img = e.target.result
                }
            },

            /*================ Get Category ================*/ 
            getCategories( page = 1 ){
                axios.get('/api/admin/categories?page=' + page)  
                .then( 
                    response => {  
                        this.categories = response.data 
                        // console.log(response.data);
                    }
                )
                .catch( error => console.log(error) )
            },

            /*================ Get Posts ================*/ 
            getPosts( page = 1 ){
                axios.get('/api/admin/posts?page=' + page)  
                .then( 
                    response => {  
                        this.posts = response.data 
                        // console.log(response.data);
                    }
                )
                .catch( error => console.log(error) )
            },

            /*=============== Create Post ================*/
            setEditFalse(){
                this.post = {
                    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    title: '',
                    img: '',
                    category_id: '',
                    body: '',
                },
                this.edit  = false // set var edit equale 'false' to know that this modal for create
            },

            createPost(){
                axios.post("/api/admin/posts" , this.post)
                // .then( response => console.log(response) ) // to show response in console ( you can name it => req , requests )
                .then( 
                    response => {  // if there success request 
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if( response.data.status == "saved" ){
                            $("#postModel").modal('hide');  // close Model
                            $(".modal-backdrop.fade.show").remove();
                            this.getPosts();    // reload getPosts()
                            this.errors = {},   // empty error var
                            this.post = {}      // empty post var
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Post Created Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            
                        }
                    }
                )
                .catch( error => console.log(error) ); 
            },

            
            
                        
            /*======= Edit Post =======*/
            setEditTrue( post ){
                this.post = {   // equale param with var post in data to bind it
                    csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    id: post.id ,
                    title: post.title,
                    img: post.img,
                    category_id: post.category_id,
                    body: post.body,
                } 
                this.edit  = true // set var edit equale 'true' to know that this modal for edit
            },
            updatePost(){
                axios.put("/api/admin/posts/" + this.post.id  ,  this.post)
                // .then( response => console.log(response) ) // to show response in console ( you can name it => req , requests )
                .then( 
                    response => {  // if there success request 
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if( response.data.status == "updated" ){
                            $("#postModel").modal('hide');  // close Model
                            $(".modal-backdrop.fade.show").remove();
                            this.getPosts();    // reload getPosts()
                            this.errors = {},   // empty error var
                            this.post = {}      // empty post var
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Post Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                )
                .catch( error => console.log(error) ); 

            },

            
            /*======= Delete Post =======*/
            deletePost(post){


                Vue.swal({

                    text: 'Are you sure delete post ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {
                    if (result.value) {

                        // do delete response
                        axios.delete("/api/admin/posts/" + post.id  )
                        .then( 
                            response => {  // if there success request 
                                if( response.data.status == "deleted" ){
                                    $("#postModel").modal('hide');  // close Model
                                    $(".modal-backdrop.fade.show").remove();
                                    this.getPosts(); // reload getPosts()
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




            },

        }
    }
</script>