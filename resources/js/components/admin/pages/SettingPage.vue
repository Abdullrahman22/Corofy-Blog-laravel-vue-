<template>
    <div class="dashboard-page">
        
        <!-- PAGE CONTAINER-->
        <div class="page-container">

            <!-- HEADER DESKTOP-->
            <topbar></topbar>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="col-lg-8 col-md-12">
                    <div class="card">
                        <div class="card-header">Site Setting</div>
                        <div class="card-body">
                            <form @submit.prevent="UpdateInfo">
                                <div class="form-group">
                                    <label for="site-name" class="control-label mb-1">Site Name</label>
                                    <input id="site-name" name="site-name" type="text" class="form-control" placeholder="Type Site Name...." v-model="site_info.site_name">
                                    <small class="text-danger" v-if="errors.site_name"> {{errors.site_name[0] }} </small> 
                                </div>
                                
                                <div class="form-group">
                                    <label for="contact-email" class="control-label mb-1">Contact Email</label>
                                    <input id="contact-email" name="contact-email" type="text" class="form-control" placeholder="Type Contact Email...." v-model="site_info.contact_email" >
                                    <small class="text-danger" v-if="errors.contact_email"> {{errors.contact_email[0] }} </small> 
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label mb-1">Address Details </label>
                                    <textarea id="address" name="address" type="text" class="form-control" placeholder="Type Address Details...." rows="6" cols="6" v-model="site_info.address" ></textarea>
                                    <small class="text-danger" v-if="errors.address"> {{errors.address[0] }} </small> 
                                </div>
                                <div>
                                    <button id="save-info" type="submit" class="btn btn-lg btn-info btn-block"> Update Setting </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
                site_info: {},
                errors: {}
            }
        },
        mounted(){
            this.getSiteInfo();
        },
        methods:{
            getSiteInfo(){
                axios.get("/api/admin/setting")
                .then( 
                    resquest => {  
                        this.site_info = resquest.data 
                        // console.log(resquest.data);
                    }
                )
                .catch( error => console.log(error) )
            },
            UpdateInfo(){
                axios.put("/api/admin/setting/update" , this.site_info)
                .then( 
                    response => {  // if there success request 
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if( response.data.status == "updated" ){
                            this.errors = {},   // empty error var
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Setting Updated Successfully',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                    }
                )
                .catch( error => console.log(error) )
            }
        }
    }

</script>