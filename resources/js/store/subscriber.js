import Axios from 'axios';
import store from './store'


store.subscribe( (mutations) => {  // call /api/auth/login mutations
    // console.log(mutations);
    switch( mutations.type ){
        case 'LoginModule/SET_TOKEN' : 

        if( mutations.payload ){
            Axios.defaults.headers.common["Authorization"] = 'Bearer ' + mutations.payload ;
            localStorage.setItem('token' , mutations.payload );
        }else{
            Axios.defaults.headers.common["Authorization"] = null ;
            localStorage.removeItem('token');
        }

        break ;
    }
})