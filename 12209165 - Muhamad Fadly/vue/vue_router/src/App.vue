<template>
  <div>
    <Navbar></Navbar>
    <div class="container">
    <section1></section1>
    <service></service>
  </div>
  </div>
</template>

<script>
  import Navbar from '@/components/layouts/Navbar.vue';
  import section1 from './components/Beranda/section1.vue';
  import service from './components/Beranda/service.vue';
  export default{
    components: {
      Navbar, 
      section1,
      service
    }
  }

</script>

