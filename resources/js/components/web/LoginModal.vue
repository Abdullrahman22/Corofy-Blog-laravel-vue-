<template>

    <!----- LogIn ------>
    <div class="modal fade register" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <h2 class="text-center">Login</h2>
                    <div class="login-form">
                        <form>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="Type your email.." v-model="user.email" autocomplete="off" >
                            </div>
                            <small class="text-danger" v-if="errors.email"> {{errors.email[0] }} </small> 
                            <br>

                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password.." v-model="user.password"  >
                            </div>
                            <small class="text-danger" v-if="errors.password"> {{errors.password[0] }} </small> 
                            <br>

                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button @click.prevent="submitForm" class="login100-form-btn">
                                        Login
                                    </button>
                                </div>
                            </div>

                        </form>
                    </div>

                    <div class="login-social-media">
                        <div class="txt1 text-center p-t-54 p-b-20">
                            <span>
                                OR LogIn Using
                            </span>
                        </div>
                        <div class="flex-c-m">
                            <a href="#" class="login100-social-item bg1">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a href="#" class="login100-social-item bg2">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a href="#" class="login100-social-item bg3">
                                <i class="fa fa-google"></i>
                            </a>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</template>
<script>
    export default {
        name: "LoginModal",
        data(){
            return{
                user:{
                    email: '' ,
                    password: '' ,
                },
                errors: {},
            }
        },
        methods:{
            submitForm(){
                axios.post('/api/login' , this.user )
                .then( 
                    response => {  // if there success request 
                        console.log( response.data );
                        if( response.data.status == "error" ){
                            this.errors = response.data.errors  // equale it with var errors in data
                        }else if ( response.data.status == "success" ){
                            this.errors = {}    // empty error var
                            this.user = {}      // empty user var
                            $("#loginModal").modal('hide');  // close Model
                            $(".modal-backdrop.fade.show").remove();
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                title: 'Login Successfully!',
                                showConfirmButton: false,
                                timer: 2500
                            });
                            /*======== Save User In Locastorage ========*/
                            localStorage.setItem( 'token' , response.data.token );
                        }
                    }
                )
                .then( error => console.log(error) )
            }
        }
    }
</script>