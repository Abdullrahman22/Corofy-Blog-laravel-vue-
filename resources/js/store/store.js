import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import Auth from './auth'

const store = new Vuex.Store({
    strict: true,
    state: {
        searchVal: "",
    },
    mutations: {
        updateSearchVal (state, queryVal) {
            state.searchVal = queryVal
        },
    },
    modules:{
        Auth
    }
})
export default store;