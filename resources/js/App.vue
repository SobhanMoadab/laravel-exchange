<template>
<transition name="fade">
<router-view></router-view>
</transition>
</template>
<script>
export default{
 name: 'App',

}
</script>
<style>
.fade-enter-active, .fade-leave-active {

  transition: opacity .2s;
}
.fade-enter, .fade-leave-to{
  opacity: 0;
}
</style>