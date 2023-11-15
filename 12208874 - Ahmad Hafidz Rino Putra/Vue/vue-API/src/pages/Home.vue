<template>
    <div class="container">
      <Beranda :data="DataHome"></Beranda>
      <Service :data="DataLayanan"></Service>
    </div>
  </template>
  <script>
  import Beranda from '@/components/beranda/Beranda.vue';
  import Service from '@/components/beranda/Service.vue';
  import { Get } from '@/api/index.js';
  
  export default {
    components: {
      Beranda,Service
    },
    data() {
      return {
        DataHome: [],
        DataLayanan: []
      }
    },
    async created() {
      // const response = await Get('http://localhost:9000/api/home');
      const response = await Get('home');
      this.DataHome = response.data;
  
      const responseLayanan = await Get('services');
      this.DataLayanan = responseLayanan.data.data;
    },
  }
  </script>