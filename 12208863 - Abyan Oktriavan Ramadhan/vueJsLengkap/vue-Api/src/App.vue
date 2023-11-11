<template>
  <navbar></navbar>
  <!-- <div class="container">
    <beranda></beranda>
    <service></service>
    <portofolio></portofolio>
    <blog></blog>
  </div> -->

  <!-- untuk menampilkan componets dari route -->
  <div class="container">
    <router-view></router-view>
  </div>
</template>

<script>
import navbar from './components/layouts/navbar.vue';
// import beranda from './components/beranda/beranda.vue';
// import service from './components/beranda/service.vue';
// import portofolio from './components/beranda/portofolio.vue';
// import blog from './components/beranda/blog.vue';
export default {
  components: {
    navbar,
    // beranda,
    // service,
    // portofolio,
    // blog
  }
}
</script>