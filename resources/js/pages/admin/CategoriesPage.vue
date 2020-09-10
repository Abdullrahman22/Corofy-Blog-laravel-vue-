<template>
    <div id="category-page">
        
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
                                Categories data
                            </h3>
                            <button class="au-btn-plus float-right" data-toggle="modal" data-target="#categoryModel"  @click="setEditFalse">
                                <i class="zmdi zmdi-plus"></i>
                            </button>
                        </div>

                        <!----- Table Data ----->
                        <div class="table-responsive m-b-40">
                            <table class="table table-borderless table-data3">
                                <thead>
                                    <tr>
                                        <th>#Id</th>
                                        <th>Title</th>
                                        <th>Created At</th>
                                        <th>Posts Count</th>
                                        <th>action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for=" category in categories.data " :key="category.id"  >
                                        <td> #{{ category.id }} </td>
                                        <td> {{ category.title }} </td>
                                        <td> {{ category.added_at }} </td>
                                        <td class="text-center"> {{ category.posts_count }} </td>
                                        <td>
                                            <div class="table-data-feature">
                                                <button class="item" data-placement="top" title="Edit" data-original-title="Edit" data-toggle="modal" data-target="#categoryModel" @click="setEditTrue(category)" >
                                                    <i class="zmdi zmdi-edit"></i>
                                                </button>
                                                <button class="item" data-toggle="tooltip" data-placement="top" title="Delete" data-original-title="Delete" @click="deleteCategory(category)">
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
                    <pagination :data="categories" @pagination-change-page="getCategories" :limit="1" ></pagination>
                </div>

            </div>
            <!----- End Main Content ----->

        </div>
        <!----- End Page Container ----->


        <!----- Category Model ----->
        <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog" aria-labelledby="categoryModelLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    
                    <div class="modal-header">
                        <h5 class="modal-title" id="categoryModelLabel"> {{ edit ? 'Edit Category' : 'Add Category'}} </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form @submit.prevent=" edit ? updateCategory() :  createCategory() ">
                            <input type="hidden" name="_token" :value="csrf">
                            <div class="form-group">
                                <label for="category-title"> Category Title </label>
                                <input type="text" id="category-title" class="form-control" name="title" placeholder="Type Category Title..." v-model="category.title">
                                <small class="text-danger" v-if="errors.title"> {{errors.title[0] }} </small> 
                            </div>
                            <div class="buttons float-right">
                                <button class="btn btn-danger " data-dismiss="modal"> Close </button>
                                <button type="submit" class="btn btn-primary ">  {{ edit ? 'Edit' : 'Save'}}  </button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <!----- End Category Model ----->


    </div>
</template>
<script>
    import Topbar from './../../components/admin/Topbar'

    export default {
        components:{
            Topbar,
        },
        data(){
            return{
                csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                categories:{}, // create empty object to insert categories in it to loop 
                category:{  // create empty object and link it with v-model for create new category 
                    title: '',
                },
                errors: {}, // create empty object to insert errors in it to show 
                edit : false // set this var to know if modal for create or edit
            }
        },
        mounted(){
            this.getCategories();
        },
        methods:{




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





            /*=============== Create Category ================*/
            setEditFalse(){
                this.category = {} ,
                this.edit  = false // set var edit equale 'false' to know that this modal for create
            },
            createCategory(){
                axios.post("/api/admin/categories" , this.category)
                // .then( response => console.log(response) ) // to show response in console ( you can name it => req , requests )
                .then( 
                    response => {  // if there success request 
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if( response.data.status == "saved" ){
                            $("#categoryModel").modal('hide');  // close Model
                            $(".modal-backdrop.fade.show").remove();
                            this.getCategories(); // reload getCategories()
                            this.errors = {},  // empty error var
                            this.category = {} // empty category var
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Category Created Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                            
                        }
                    }
                )
                .catch( error => console.log(error) ); 
            },


            
            
                        
            /*======= Edit Category =======*/
            setEditTrue( category ){
                this.category = category // equale param with var category in data to bind it
                this.edit  = true // set var edit equale 'true' to know that this modal for edit
            },
            updateCategory(){
                axios.put("/api/admin/categories/" + this.category.id  , this.category )
                // .then( response => console.log(response) ) // to show response in console ( you can name it => req , requests )
                .then( 
                    response => {  // if there success request 
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if( response.data.status == "updated" ){
                            $("#categoryModel").modal('hide');  // close Model
                            $(".modal-backdrop.fade.show").remove();
                            this.getCategories(); // reload getCategories()
                            this.errors = {},  // empty error var
                            this.category = {} // empty category var
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Category Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                )
                .catch( error => console.log(error) ); 
            },

            
            
            


            /*======= Delete Category =======*/
            deleteCategory(category){


                Vue.swal({

                    text: 'Are you sure delete category ?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'

                    }).then((result) => {
                    if (result.value) {

                        // do delete response
                        axios.delete("/api/admin/categories/" + category.id  )
                        .then( 
                            response => {  // if there success request 
                                if( response.data.status == "deleted" ){
                                    this.getCategories(); // reload getCategories()
                                }
                            }
                        )
                        .catch( error => console.log(error) ); 

                        // if Deleted
                        Vue.swal({
                            position: 'top-end',
                            icon: 'success',
                            text: 'Category Deleted Successfully',
                            showConfirmButton: false,
                            timer: 1500
                        });

                    }
                })








            },
            
        }
    }
</script>