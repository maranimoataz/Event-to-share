
import VueRoute from 'vue-router'
import Home from './components/Home'
import Register from './components/pages/Register'
import Login from './components/pages/Login'
import Listing from './components/mur/Listing'
import Add from './components/mur/Add'
import image from './components/mur/image'
import Vue from 'vue'


const routes =[
    {
    path: '/',
    name: 'home',
    component: Home,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
        },
        {
            path: '/login',
            name: 'login',
            component: Login,
            },
            {
                path: '/listing',
                name: 'listing',
                component: Listing,
                },
                {
                path: '/add',
                name: 'add',
                component: Add,
                },
                {
                    path: '/image',
                    name: 'image',
                    component: image,
                    }
                


]
Vue.use(VueRoute);

const router = new VueRoute({
    routes,
    mode: 'history',
    history: true,
});

export default router