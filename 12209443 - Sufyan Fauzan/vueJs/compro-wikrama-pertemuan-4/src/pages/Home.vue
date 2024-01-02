<template>
  <div class="container">
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
  </div>
</template>
<script>
import Navbar from '@/components/Layouts/Navbar.vue';
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue'
import { Get } from '@/Api/index.js';

export default {
  components: {
    Navbar,
    Beranda,
    Service,
  },
  data() {
    return {
      DataHome: [],
      DataLayanan: [],
    }
  },
  async created() {
    // api untuk home
    const response = await Get('home');
    this.DataHome = response.data;
    // api untuk layanan
    const responseLayanan = await Get('services');
    this.DataLayanan = responseLayanan.data.data;
  },
}
</script>