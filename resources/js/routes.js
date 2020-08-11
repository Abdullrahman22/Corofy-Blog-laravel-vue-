/*================ Web Components ==================*/
import HomePage  from './components/web/pages/HomePage.vue'
import AboutPage  from './components/web/pages/AboutPage.vue'
import ContactPage  from './components/web/pages/ContactPage.vue'
import PostPage  from './components/web/pages/PostPage.vue'
import CategoryPage  from './components/web/pages/CategoryPage.vue'

/*================ Admin Components ==================*/
import DashboardPage  from './components/admin/pages/DashboardPage'
import AccountPage  from './components/admin/pages/AccountPage'
import SettingPage  from './components/admin/pages/SettingPage'




const routes = [
    /*================ Web Routes ==================*/
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
    { path: '/post/:slug' , component: PostPage },
    { path: '/category/:slug' , component: CategoryPage },

    /*================ Admin Routes ==================*/
    { path: '/admin/' , component: DashboardPage },
    { path: '/admin/account' , component: AccountPage },
    { path: '/admin/setting' , component: SettingPage },

]
export default routes;
