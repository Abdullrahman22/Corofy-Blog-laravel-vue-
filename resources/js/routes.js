import HomePage  from './components/HomePage.vue'
import AboutPage  from './components/AboutPage.vue'
import ContactPage  from './components/ContactPage.vue'

const routes = [
    { path: '/' , component: HomePage },
    { path: '/about' , component: AboutPage },
    { path: '/contact' , component: ContactPage },
]
export default routes;
