<template>
    <div class="top-bar">
        <div class="container">
            <div class="row">
                <div class="col-6 social">
                    <a href="#"><span class="fa fa-youtube-play"></span></a>
                    <a href="#"><span class="fa fa-snapchat"></span></a>
                    <a href="#"><span class="fa fa-vimeo"></span></a>
                    <a href="#"><span class="fa fa-twitter"></span></a>
                    <a href="#"><span class="fa fa-facebook"></span></a>
                    <a href="#"><span class="fa fa-instagram"></span></a>
                </div>
                <div class="col-6 register-links" style="color: #fff">
                    <a href="#" data-toggle="modal" data-target="#loginModal" >Login</a>
                    /
                    <a href="#" data-toggle="modal" data-target="#signUpModal" >SignUp</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Topbar",
}
</script>