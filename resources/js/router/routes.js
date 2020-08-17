/*================ Web Components ==================*/
import HomePage  from './../components/web/pages/HomePage.vue'
import AboutPage  from './../components/web/pages/AboutPage.vue'
import ContactPage  from './../components/web/pages/ContactPage.vue'
import PostPage  from './../components/web/pages/PostPage.vue'
import CategoryPage  from './../components/web/pages/CategoryPage.vue'
import NotFoundPage  from './../components/web/pages/NotFoundPage.vue'


/*================ Admin Components ==================*/
import OverViewPage  from './../components/admin/pages/OverViewPage'
import UsersPage  from './../components/admin/pages/UsersPage.vue'
import AccountPage  from './../components/admin/pages/AccountPage'
import SettingPage  from './../components/admin/pages/SettingPage'




const routes = [

    /*================ Web Routes ==================*/
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
    { path: '/post/:slug' , component: PostPage },
    { path: '/category/:slug' , component: CategoryPage },
    { path: '*', component: NotFoundPage },

    /*================ Admin Routes ==================*/
    { path: '/admin/overview' , component: OverViewPage },
    // Users Routes
    { path: '/admin/users' , component: UsersPage },

    { path: '/admin/account' , component: AccountPage },
    { path: '/admin/setting' , component: SettingPage },
    { path: '/admin/*', component: NotFoundPage },


]
export default routes;