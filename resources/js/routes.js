import HomePage  from './components/HomePage.vue'
import AboutPage  from './components/AboutPage.vue'
import ContactPage  from './components/ContactPage.vue'
import PostPage  from './components/PostPage.vue'

const routes = [
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
    { path: '/post/:slug' , component: PostPage },
]
export default routes;
