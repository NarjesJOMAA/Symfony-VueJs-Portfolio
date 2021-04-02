import Vue from 'vue'
import VueRouter from 'vue-router'
import Home from '../views/Home.vue'
import Portfolio from '../views/Portfolio.vue'
import User from '../views/User.vue'
import Skills from '../views/Skills.vue'
import Contact from '../views/Contact.vue'
import i18n from '../i18n'



Vue.use(VueRouter)

  const routes = [
  {
    path:'/',
    redirect: `/${i18n.locale}`
  },
  {
    path: '/:lang',
    component:{
      render(c){return c('router-view')}
    },
    children: [
      {
        path: '/',
        name: 'Home',
        component: Home
      },
      {
        path: 'portfolio',
        name: 'Portfolio',
        component: Portfolio
      },
      {
        path: 'user',
        name: 'User',
        component: User
      },
      {
        path: 'skills',
        name: 'Skills',
        component: Skills
      },
      {
        path: 'contact',
        name: 'Contact',
        component: Contact
      }  

    ]  
  }
]

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  routes
})

export default router
