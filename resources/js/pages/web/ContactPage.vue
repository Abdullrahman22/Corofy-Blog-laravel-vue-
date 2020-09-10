<template>
    <div id="contact-page">

        <div class="container">
            <div class="row mb-4 blog-entries">

                <!------------ searching Posts ----------------->
                <searching :searchVal="searchVal" v-if="searchVal"></searching>

                <!------------ contact page content ----------------->
                <div class="col-md-12 col-lg-8 main-content" v-else>
                    <h1>Contact Me</h1>
                    <form action="#" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control ">
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control ">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Write Message</label>
                                <textarea name="message" id="message" class="form-control " cols="30" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <input type="submit" value="Send Message" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                    

                </div>

                <!-- sidebar Component -->
                <sidebar></sidebar>


            </div>
      </div>
         
        <!------ Register Modals ------>
        <register-modals></register-modals>


    </div>
</template>
<script>

    import Sidebar from './../../components/web/Sidebar'
    import Searching from './../../components/web/Searching'
    import RegisterModals from './../../components/web/RegisterModals'

    export default {
        components:{
            Sidebar,
            Searching,
            RegisterModals,
        },
        computed: {
            searchVal: function() {
                return this.$store.state.searchVal;
            }
        },
    }
    
</script>