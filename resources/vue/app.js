// require('./bootstrap');

window.Vue = require('vue').default;
// import axios from 'axios';
// import VueAxios from 'vue-axios';
import Vue from 'vue';
import App from './App.vue';
import router from './router';


const app = new Vue({
    el: '#app',
    components: { App },
    router,
});