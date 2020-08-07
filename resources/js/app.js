

require('./bootstrap');
window.Vue = require('vue');

/*=============== Vue Router ====================*/
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes'


/*=============== Pagination ====================*/
Vue.component('pagination', require('laravel-vue-pagination'));


/*=============== const router ====================*/
const router = new VueRouter({
    mode: "history",
    routes : routes ,  // OR only routes in ES6
    scrollBehavior (to, from, savedPosition) {
        return { x: 0, y: 0 }   // at click router link vuejs go top page "vue router scroll behavior"
    }
})


/*=============== Vue Instance ====================*/
const app = new Vue({
    el: '#app',
    router
});
