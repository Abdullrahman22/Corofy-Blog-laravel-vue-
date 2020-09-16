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
                                <input class="input100" type="text" name="username" placeholder="Type your username..">
                            </div>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Email</span>
                                <input class="input100" type="text" name="email" placeholder="Type your email..">
                            </div>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password..">
                            </div>
                            <div class="wrap-input100 validate-input m-b-23">
                                <span class="label-input100">Password Again</span>
                                <input class="input100" type="password" name="password" placeholder="Type your password Again..">
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
                </div>
            </div>
        </div>
    </div>

</template>
<script>
export default {
    name: "RegisterModal"
}
</script>