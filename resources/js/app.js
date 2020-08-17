

require('./bootstrap');
window.Vue = require('vue');

/*======= Vue Router =======*/
import router from './router/vue-router'

/*======= VueX =======*/
import store from './store'

/*======= pagination =======*/
Vue.component('pagination', require('laravel-vue-pagination'));

/*======= Vue Instance =======*/
const app = new Vue({
    el: '#app',
    router,
    store  
});
