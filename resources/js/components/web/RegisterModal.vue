<template>

    <!----- SignUp ------>
    <div class="modal fade register" id="signUpModal" tabindex="-1" role="dialog" aria-labelledby="signUpModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h2 class="text-center">SignUp</h2>
                    <div class="login-form">
                        <form>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Username</span>
                                <input class="input100" type="text" name="username" placeholder="Type your username.." v-model="form.name" autocomplete="off">
                            </div>
                            <small class="text-danger" v-if="errors.name"> {{errors.name[0] }} </small> 
                            <br>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="Type your email.." v-model="form.email" autocomplete="off">
                            </div>
                            <small class="text-danger" v-if="errors.email"> {{errors.email[0] }} </small> 
                            <br>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password.." v-model="form.password" >
                            </div>
                            <small class="text-danger" v-if="errors.password"> {{errors.password[0] }} </small> 
                            <br>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password Again</span>
                                <input class="input100" type="password" name="password_confirmation" placeholder="Type your password Again.." v-model="form.password_confirmation" >
                            </div>
                            <small class="text-danger" v-if="errors.password_confirmation"> {{errors.password_confirmation[0] }} </small> 
                            <br>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button  @click.prevent="submitForm" class="login100-form-btn">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    name: "RegisterModal",
    data(){
        return{
            form:{
                name: '' ,
                email: '' ,
                password: '' ,
                password_confirmation: '' ,
            },
            errors: {}
        }
    },
    methods:{
        submitForm(){
            axios.post('/api/auth/register' , this.form )
            .then( 
                response => {  // if there success request 
                    // console.log( response.data );
                    if( response.data.status == "error" ){
                        this.errors = response.data.errors  // equale it with var errors in data
                    }else{
                        this.errors = {}    // empty error var
                        this.user = {}      // empty user var
                        $("#signUpModal").modal('hide');  // close Model
                        $(".modal-backdrop.fade.show").remove();
                        /*======== Sweet Alert ============*/
                        Vue.swal({
                            position: 'top-end',
                            icon: 'success',
                            title: 'SigIn Now!',
                            text: 'Congratulations Account Created Successfully',
                            showConfirmButton: false,
                            timer: 2500
                        });
                        $('#loginModal').modal('show');
                    }
                }
            )
            .then( error => console.log(error) )
        }
    }
}
</script>