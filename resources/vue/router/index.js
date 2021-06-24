import Vue from 'vue';
import VueRouter from 'vue-router';
import Register from '../Pages/Auth/Register.vue'
import Login from '../Pages/Auth/Login.vue'
Vue.use(VueRouter);
export default new VueRouter({
    routes: [
        /* Site router*/
        { path: '/', component: () => import('../Pages/Site/Home') },
        /* End Site router*/
        /* Admin router*/
        { name:'Admin',path: '/admin', component:() => import('../Pages/Admin/Home') },
        {name: 'Posts', path: '/admin/posts', component: () => import('../Pages/Admin/Posts/Posts') },
        { name:'NewPost',path: '/admin/posts/new-post', component: () => import('../Pages/Admin/Posts/NewPost') },
        /* End Admin router*/
        { path: '/login',component: Login,},
        { path: '/register',component: Register,},
        
    ],
    mode: 'history'
})