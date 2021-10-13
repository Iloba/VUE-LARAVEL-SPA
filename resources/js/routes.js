import Home from './components/Home';
import About from './components/About';
import Contact from './components/Contact';
import NotFound from './components/NotFound';
import Register from './components/auth/Register';
import Login from './components/auth/Login';
import Dashboard from './components/auth/Dashboard';
import axios from 'axios';


export default{
    mode: 'history',
    linkActiveClass: 'text-bold',
    routes: [
        {
            path: '*',
            component: NotFound
        },
        {
            path: '/',
            component: Home,
            name: 'Home'
        },
        {
            path: '/about',
            component: About
        },
        {
            path: '/contact',
            component: Contact
        },
        {
            path: '/login',
            component: Login,
            name: 'Login'
        },
        {
            path: '/register',
            component: Register,
            name: 'Register'
        },
        {
            path: '/dashboard',
            component: Dashboard,
            name: 'Dashboard',

            //authenticate user
            beforeEnter: (to, from, next) => {
                axios.get('api/authenticated')
                .then(() => {
                    next()
                }).catch(()=>{
                    return next({name: 'Login'});
                })
            }
        },
        
    ]

}