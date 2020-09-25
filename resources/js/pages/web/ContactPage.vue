<template>
    <div id="contact-page">

        <div class="container">
            <div class="row mb-4 blog-entries">

                <!------------ searching Posts ----------------->
                <searching :searchVal="searchVal" v-if="searchVal"></searching>

                <!------------ contact page content ----------------->
                <div class="col-md-12 col-lg-8 main-content" v-else>
                    <h1>Contact Me</h1>
                    <form @submit.prevent="submitForm" method="post">
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="name">Name</label>
                                <input type="text" id="name" class="form-control " v-model="contact_form.name">
                                <small class="text-danger" v-if="errors.name"> {{errors.name[0] }} </small> 
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="phone">Phone</label>
                                <input type="text" id="phone" class="form-control " v-model="contact_form.phone">
                                <small class="text-danger" v-if="errors.phone"> {{errors.phone[0] }} </small> 
                            </div>
                            <div class="col-md-12 form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" class="form-control " v-model="contact_form.email">
                                <small class="text-danger" v-if="errors.email"> {{errors.email[0] }} </small> 
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 form-group">
                                <label for="message">Write Message</label>
                                <textarea name="message" id="message" class="form-control " cols="30" rows="8" v-model="contact_form.messege" ></textarea>
                                <small class="text-danger" v-if="errors.messege"> {{errors.messege[0] }} </small> 
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
         


    </div>
</template>
<script>

    import Sidebar from './../../components/web/Sidebar'
    import Searching from './../../components/web/Searching'

    export default {
        components:{
            Sidebar,
            Searching,
        },
        data(){
            return{
                contact_form:{
                    name: '',
                    phone: '',
                    email: '',
                    messege: '',
                },
                errors: {}
            }
        },
        computed: {
            searchVal: function() {
                return this.$store.state.searchVal;
            }
        },
        methods:{
            submitForm(){
                axios.post("/api/add-messege" , this.contact_form )
                .then( 
                    resquest => {  
                        // console.log(resquest.data);
                        if( resquest.data.status == 'error' ){
                            this.errors = resquest.data.errors
                        }
                        else if( resquest.data.status == 'success' ){
                            this.errors = {}  // empty error var
                            this.$router.push({ name: 'HomePage' }) ; // after successfully sent messege direct to home page 
                            /*======== Sweet Alert ============*/
                            Vue.swal({
                                position: 'top-end',
                                icon: 'success',
                                text: 'Your Messege Sent Successfully ',
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