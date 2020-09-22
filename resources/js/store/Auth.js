const Auth =  {
    namespaced: true ,
    state:{
        token: null,
        user: null,
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
        }
    },
    mutations:{
        SET_TOKEN(state , token){
            state.token = token  // change token val in state
        },
        SET_USER(state , user){
            state.user = user  // change user val in state
        },
    },
    actions:{

        logIn( { dispatch } , credentials){
            axios.post('/api/auth/login' , credentials )
            .then( 
                response => {  
                    // console.log( response.data );
                    dispatch('attempt' , response.data.token ) // 'dispatch' ==>  to link param with attempt function and call it to run
                }
            )
            .then( error => console.log(error) )
        },

        attempt( { commit } , token ){  
            commit('SET_TOKEN' , token )  // 'commit' ==>  to link SET_TOKEN with mutations and call it to run
            /*====== Get Logged User Info By Token ======*/
            try{         
                axios.get('/api/auth/user-Info' , {
                    headers:{
                        "Authorization" : 'Bearer ' + token
                    }
                })
                .then( 
                    response => {  
                        // console.log( response.data );
                        commit('SET_USER' , response.data.user )  // 'commit' ==>  to link SET_USER with mutations and call it to run
                    }
                )
                .then( error => console.log(error) )
            }catch(error){
                commit('SET_TOKEN' , null ) // call mutations SET_TOKEN with null param
                commit('SET_USER'  , null ) // call mutations SET_USER  with null param
            }
        }

    },
}

export default Auth