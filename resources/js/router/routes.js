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
import CategoriesPage  from './../components/admin/pages/CategoriesPage.vue'
// Posts components
import PostsPage  from './../components/admin/pages/posts/PostsPage.vue'
import PostsHomePage  from './../components/admin/pages/posts/PostsHomePage.vue'
import PostViewPage  from './../components/admin/pages/posts/PostViewPage.vue'
// Comments Component
import CommentsPage  from './../components/admin/pages/CommentsPage.vue'
// Messeges Component
import MessegesPage  from './../components/admin/pages/MessegesPage.vue'
// Setting component
import SettingPage  from './../components/admin/pages/SettingPage.vue'




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
    // Categories Routes
    { path: '/admin/categories' , component: CategoriesPage },
    // posts Routes
    { path: '/admin/posts' , component: PostsPage , children:[
        { path: '' , component: PostsHomePage },
        { path: ':id' , component: PostViewPage , props: true },
    ]},
    // Comments Routes
    { path: '/admin/comments' , component: CommentsPage },
    // Messeges Routes
    { path: '/admin/messeges' , component: MessegesPage },
    // Setting Route
    { path: '/admin/setting' , component: SettingPage },




]
export default routes;