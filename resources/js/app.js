require('./bootstrap');
import HomeComponent from "./components/HomeComponent.vue"

import Vue from 'vue'

import VueRouter from 'vue-router'
Vue.use(VueRouter)
 import {routes} from './routes';


   // Sweet Alert start 
   import Swal from 'sweetalert2'
   window.Swal = Swal;
  // Import Notification Class
  import Notification from './Helpers/Notification';
  window.Notification = Notification



window.Reload = new Vue();
const router = new VueRouter({
  routes,
  mode: 'history' 
})


export const  app = new Vue({
    el: '#app',
    router,
    components:{
      HomeComponent
    }
});









