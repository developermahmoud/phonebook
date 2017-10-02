require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router'
Vue.use(VueRouter)

let Myheader = require('./components/MyHeader.vue')
let Myfooter = require('./components/MyFooter.vue')

let Home = require('./components/Home.vue')
let About = require('./components/About.vue')

const routes = [
  { path: '/', component: Home },
  { path: '/about', component: About }
]
const router = new VueRouter({
    //mode:'history',
    routes
})

const app = new Vue({
    el: '#app',
    components: {Myheader,Myfooter},
    router
});
