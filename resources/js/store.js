import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

const store = new Vuex.Store({
    strict: true,
    state: {
        searchVal: ""
    },
    mutations: {
        updateSearchVal (state, queryVal) {
            state.searchVal = queryVal
        }
    }
})
export default store;