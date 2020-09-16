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
                                <input class="input100" type="text" name="email" placeholder="Type your email..">
                            </div>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password..">
                            </div>
                            <div class="container-login100-form-btn">
                                <div class="wrap-login100-form-btn">
                                    <div class="login100-form-bgbtn"></div>
                                    <button class="login100-form-btn">
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
        name: "LoginModal"
    }
</script>