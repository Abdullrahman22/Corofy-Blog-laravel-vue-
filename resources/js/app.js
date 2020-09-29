
/*======= import Vue & Bootstrap =======*/
require('./bootstrap');
window.Vue = require('vue');

/*======= Vue Router =======*/
import router from './router/vue-router'

/*======= VueX =======*/
import store from './store/store'

/*======= pagination =======*/
Vue.component('pagination', require('laravel-vue-pagination'));

/*======= subscriber =======*/
require("./store/subscriber");
store.dispatch("LoginModule/attempt" , localStorage.getItem("token")  );

/*======= Sweetalert2 =======*/
import VueSweetalert2 from 'vue-sweetalert2';
Vue.use(VueSweetalert2);;


/*======= Register Components in Blade File =======*/
// web
Vue.component('header-component', require('./components/web/Header.vue').default);
Vue.component('footer-component', require('./components/web/Footer.vue').default);
Vue.component('register-model', require('./components/web/RegisterModal.vue').default);
Vue.component('login-model', require('./components/web/LoginModal.vue').default);
// admin
Vue.component('menu-sidebar', require('./components/admin/MenuSidebar.vue').default);
Vue.component('menu-mobile', require('./components/admin/MenuMobile.vue').default);
Vue.component('topbar', require('./components/admin/topbar.vue').default);



/*======= Vue Instance =======*/
const app = new Vue({
    el: '#app',
    router,
    store ,
});
