

require('./bootstrap');
window.Vue = require('vue');

/*=============== Vue Router ====================*/
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes'

//  const router 
const router = new VueRouter({
    mode: "history",
    routes : routes ,  // OR only routes in ES6
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }   // at click router link vuejs go top page "vue router scroll behavior"
    }
})


/*=============== VueX ====================*/
import store from './store'


/*=============== Pagination ====================*/
Vue.component('pagination', require('laravel-vue-pagination'));




/*=============== Vue Instance ====================*/
const app = new Vue({
    el: '#app',
    router,
    store  
});
