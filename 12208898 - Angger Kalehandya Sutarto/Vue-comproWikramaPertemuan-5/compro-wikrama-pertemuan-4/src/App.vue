<template>
  <Navbar></Navbar>
  <router-view></router-view>
</template>
<script>
import Navbar from '@/components/Layouts/Navbar.vue';
export default {
  components: {
    Navbar,
  }
}
</script>

