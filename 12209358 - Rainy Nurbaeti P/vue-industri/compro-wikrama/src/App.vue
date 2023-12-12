<template>
  <Navbar></Navbar>
  <!-- <div class="container">
  <Beranda></Beranda>
  <Service></Service>
  <Portofolio></Portofolio>
  <Blog></Blog>
  </div> -->
  <!-- //untuk menampilkan komonens route -->
  <div class="container">
  <router-view></router-view>
  </div>
</template>

<script>
import Navbar from '@/components/layouts/Navbar.vue';
//  import Beranda from '@/components/Beranda/Beranda.vue';
//  import Service from '@/components/Beranda/Service.vue';
//  import Portofolio from '@/components/Beranda/Portofolio.vue';
// import Blog from '@/components/Beranda/Blog.vue';
// import Card from '@/components/Service/Card.vue';


export default{
  components: {
      Navbar,
      // Beranda,
      // Service,
      // Portofolio,
      // Blog,
      // Card
      
  },
}
</script>