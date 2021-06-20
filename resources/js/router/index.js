import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminHome from '../Pages/Admin/Home.vue'
import AdminPages from '../Pages/Admin/Pages.vue'
import AdminContent from '../Pages/Admin/Content.vue'
import HomePage from '../Pages/Site/Home.vue'
import Register from '../Pages/Auth/Register.vue'
import Login from '../Pages/Auth/Login.vue'
Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        { path: '/admin', component: AdminHome },
        { path: '/admin/page', component: AdminPages },
        { path: '/admin/content', component: AdminContent },

        { path: '/', component: HomePage },

        { path: '/login',component: Login,},
        { path: '/register',component: Register,},
        
    ],
    mode: 'history'
})