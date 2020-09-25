const Auth =  {
    namespaced: true ,
    state:{
        token: null,
        user: null,
        errors: null
    },
    getters:{
        authenticated( state  ){
            return state.token && state.token  // return true if token not null
            // if( state.token != null ){
            //     return true ;
            // }
        },
        user( state ){
            return state.user
        },
        errors( state ){
            return state.errors
        },
    },
    mutations:{
        SET_TOKEN(state , token){
            state.token = token  // change token val in state
        },
        SET_USER(state , user){
            state.user = user  // change user val in state
        },
        SET_ERRORS(state , errors){
            state.errors = errors  // change errors val in state
        },
    },
    actions:{
        logIn( context , credentials ){
            axios.post('/api/auth/login' , credentials )
            .then( 
                response => {  
                    if( response.data.status == "error" ){
                        context.commit('SET_ERRORS' , response.data.errors )  // 'commit' ==>  to link SET_TOKEN with mutations and call it to run
                    }else if ( response.data.status == "success" ){
                        context.commit('SET_ERRORS' , null )    // empty error var
                        context.dispatch('attempt' , response.data.token ) // 'dispatch' ==>  to link param with attempt function and call it to run
                        $("#loginModal").modal('hide');  // close Model
                        $(".modal-backdrop.fade.show").remove();
                        /*======== Sweet Alert ========*/
                        Vue.swal({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Login Successfully!',
                            showConfirmButton: false,
                            timer: 2500
                        });
                    }
                }
            )
            .then( error => console.log(error) )
        },
        async attempt( { commit , state } , token ){  

            if(token){    // if token exist from signIn 
                commit('SET_TOKEN' , token )  // 'commit' ==>  to link SET_TOKEN with mutations and call it to run
            }
            if( !state.token ){
                return       // continue 
            }
            
            /*====== Get Logged User Info By Token ======*/
            try{         
                let response = await axios.get('/api/auth/user-Info')
                commit('SET_USER' , response.data.user ) 
            }catch(error){
                commit('SET_TOKEN' , null ) // call mutations SET_TOKEN with null param
                commit('SET_USER'  , null ) // call mutations SET_USER  with null param
            }
        }
    },
}

export default Auth