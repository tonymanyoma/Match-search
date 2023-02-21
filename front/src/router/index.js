import Vue from 'vue'
import VueRouter from 'vue-router'

// import Home from '../views/Home.vue'
// import Welcome from '../views/Welcome.vue'
import Login from '../views/Login/Index.vue'
import Home from '../views/Home/Index.vue'
import Register from '../views/Register/Index.vue'

Vue.use(VueRouter)

const routes = [
  {
    path: '/',
    name: 'login',
    component: Login
  },
  {
    path: '/register',
    name: 'register',
    component: Register
  },
  {
    path: '/home',
    name: 'home',
    component: Home
  }
  // {
  //   path: '/home/:id',
  //   name: 'Home',
  //   component: Home
  // }
]

const router = new VueRouter({
  routes
})

export default router
