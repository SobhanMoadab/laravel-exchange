// require('./bootstrap');

window.Vue = require('vue').default;
// import axios from 'axios';
// import VueAxios from 'vue-axios';
// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import AdminHome from './Pages/Admin/Home.vue'
// Vue.use(VueAxios, axios);
// Vue.use(VueRouter)
// const app = new Vue(
//     Vue.util.extend(App)
// ).$mount('#app');  
// const app = new Vue({
//     el: '#app',
//     // components: { App },
//     router
// });
import { createApp } from 'vue'
import App from './App.vue';
import router from './router'
const app = new Vue({
    render: h => h(App),
    router,
}).$mount('#app');