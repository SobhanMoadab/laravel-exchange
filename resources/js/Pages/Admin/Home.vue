<template>
    <fragment>
        <Index />
    </fragment>
</template>
<script>
import {Fragment} from 'vue-fragment';
import Index from '../../Components/Admin/index.vue';
export default {
    name: 'AdminHome',
    components:{
        Index,
        Fragment,

    }
}
</script>