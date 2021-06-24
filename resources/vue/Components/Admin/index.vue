<template>
<fragment>
<Header />
<Sidebar />
<Main />
<Footer />
</fragment>


</template>
<script>
import Vue from 'vue';
import {Fragment} from 'vue-fragment';
import Header from './Header.vue';
import Sidebar from './Sidebar.vue';
import Main from './Main.vue';
import Footer from './Footer.vue';
Vue.use(Fragment);
export default{
    name:'AdminDashboard',
    components:{
        Header,
        Sidebar,
        Main,
        Footer,
        Fragment
        }
}
</script>


<style>
  /* @import '../../../css/vendor/bootstrap.min.css';
  @import '../../../css/vendor/bootstrap.rtl.only.min.css';
  @import '../../../css/vendor/fullcalendar.min.css';
  @import '../../../css/vendor/dataTables.bootstrap4.min.css';
  @import '../../../css/vendor/datatables.responsive.bootstrap4.min.css';
  @import '../../../css/vendor/select2.min.css';
  @import '../../../css/vendor/perfect-scrollbar.css';
  @import '../../../css/vendor/glide.core.min.css';
  @import '../../../css/vendor/bootstrap-stars.css';
  @import '../../../css/vendor/nouislider.min.css';
  @import '../../../css/vendor/bootstrap-datepicker3.min.css';
  @import '../../../css/vendor/component-custom-switch.min.css';
  @import '../../../css/main.css'; */
</style>
