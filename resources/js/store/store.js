import Vue from 'vue'
import Vuex from 'vuex'
Vue.use(Vuex)

import LoginModule from './LoginModule'

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
        LoginModule
    }
})
export default store;