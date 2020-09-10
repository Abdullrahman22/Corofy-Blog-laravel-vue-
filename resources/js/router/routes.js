/*================ Web Components ==================*/
import HomePage  from './../pages/web/HomePage.vue'
import AboutPage  from './../pages/web/AboutPage.vue'
import ContactPage  from './../pages/web/ContactPage.vue'
import PostPage  from './../pages/web/PostPage.vue'
import CategoryPage  from './../pages/web/CategoryPage.vue'
import NotFoundPage  from './../pages/web/NotFoundPage.vue'


/*================ Admin Components ==================*/
import OverViewPage  from './../pages/admin/OverViewPage'
import UsersPage  from './../pages/admin/UsersPage.vue'
import CategoriesPage  from './../pages/admin/CategoriesPage.vue'
// Posts components
import PostsPage  from './../pages/admin/posts/PostsPage.vue'
import PostsHomePage  from './../pages/admin/posts/PostsHomePage.vue'
import PostViewPage  from './../pages/admin/posts/PostViewPage.vue'
// Comments Component
import CommentsPage  from './../pages/admin/CommentsPage.vue'
// Messeges Component
import MessegesPage  from './../pages/admin/MessegesPage.vue'
// Setting component
import SettingPage  from './../pages/admin/SettingPage.vue'




const routes = [



    /*================ Web Routes ==================*/
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
    { path: '/post/:slug' , component: PostPage },
    { path: '/category/:slug' , component: CategoryPage },
    { path: '*', component: NotFoundPage , name: 'NotFoundPage'  },




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