require('./bootstrap');
window.Vue = require('vue');

import Vue from 'vue'
import VueRouter from 'vue-router'
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
//components
import Myheader from '../js/components/Header'
import Home from '../js/components/Home'
import About from '../js/components/About'
import Modal from '../js/components/Modal'
Vue.use(VueRouter)
Vue.use(VueSweetalert2);
/*----------------------------------------*/

import vueResource from 'vue-resource'
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.use(vueResource)

/*----------------------------------------*/
const routes = [
  { path: '/', component: Home,name:'home' },
  { path: '/about', component: About,name: 'about' }
]

const router = new VueRouter({
  routes,
  mode: 'history',
})
const app = new Vue({
    el: '#app',
    router,
    components:{Myheader,Home,About}
});

