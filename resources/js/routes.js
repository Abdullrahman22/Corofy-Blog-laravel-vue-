import HomePage  from './components/HomePage.vue'
import AboutPage  from './components/AboutPage.vue'
import ContactPage  from './components/ContactPage.vue'
import PostPage  from './components/PostPage.vue'
import CategoryPage  from './components/CategoryPage.vue'

const routes = [
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
    { path: '/post/:slug' , component: PostPage },
    { path: '/category/:slug' , component: CategoryPage },
]
export default routes;
