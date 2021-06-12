// require('./bootstrap');

window.Vue = require('vue').default;
import App from './App.vue';
import axios from 'axios';
import VueAxios from 'vue-axios';
import Vue from 'vue';
import VueRouter from 'vue-router';
Vue.use(VueAxios, axios, VueRouter);

// const routers = [{
//     name: '/',
//     path: '/',
//     components: AdminDashboard
// }];
// const router = new VueRouter({ mode: 'history', router: routers });

// const app = new Vue(
//     Vue.util.extend(App)
// ).$mount('#app');

// const app = new Vue({
//     el: '#app'
// });

new Vue({
    render: h => h(App),
}).$mount('#app');