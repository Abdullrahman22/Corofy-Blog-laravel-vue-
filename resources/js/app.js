

require('./bootstrap');
window.Vue = require('vue');

/*=============== Vue Router ====================*/
import VueRouter from 'vue-router'
Vue.use(VueRouter)
import routes from './routes'


/*=============== Pagination ====================*/
Vue.component('pagination', require('laravel-vue-pagination'));


const router = new VueRouter({
    mode: "history",
    routes : routes   // OR only routes 
})

const app = new Vue({
    el: '#app',
    router
});
