<template>
   <div>
     <Beranda :data="DataHome"></Beranda>
     <Service :data="DataLayanan"></Service>
     <Portofolio :data="DataPortofolio"></Portofolio>
     <Blog></Blog>
     
   </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue';
// import Portofolio from '@/components/Beranda/Portofolio.vue';
// import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default{
    components: {
        Beranda, Service,
    },
    data(){
    return{
      DataHome:[],
      DataLayanan:[]
    }
  },
  async created(){
    const response = await Get('http:/localhost:9000/api/home');
    this.DataHome = response.data;

    const responseLayanan = await Get('http:/localhost:9000/api/services')
    this.DataLayanan = response.data.data;
  
    const responsePortofolio = await Get('http:/localhost:9000/api/services')
    this.DataPortofolio = response.data.data;
  },
}
</script>