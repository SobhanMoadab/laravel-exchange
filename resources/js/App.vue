<template>
<admin-dashboard/>

</template>
<script>
import Vue from 'vue';
import VueRouter from 'vue-router';
import AdminDashboard from './Components/Admin/index.vue';
Vue.use(VueRouter);
const routers = [{
    name: '/',
    path: '/',
    components:{
        AdminDashboard
    }
}];
const router = new VueRouter({ mode: 'history', router: routers });

export default{
 name: 'App',
     components:{
        AdminDashboard
    }
}
</script>