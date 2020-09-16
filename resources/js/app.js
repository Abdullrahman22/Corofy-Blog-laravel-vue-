
/*======= import Vue & Bootstrap =======*/
require('./bootstrap');
window.Vue = require('vue');

/*======= Vue Router =======*/
import router from './router/vue-router'

/*======= VueX =======*/
import store from './store'

/*======= pagination =======*/
Vue.component('pagination', require('laravel-vue-pagination'));

/*======= Sweetalert2 =======*/
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);;


/*======= register Components in Blade File =======*/
Vue.component('Topbar', require('./components/web/Topbar.vue').default);



/*======= Vue Instance =======*/
const app = new Vue({
    el: '#app',
    router,
    store ,
});
