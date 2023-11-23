<template>
    <div class="container">
      <Beranda :data="DataHome"></Beranda>
      <Service :data="DataLayanan"></Service>
      <Portofolio :data="DataPortofolio"></Portofolio>
      <Blog :data="DataBlog"></Blog>
    </div>
</template>

<script>

import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue';
import Portofolio from '@/components/Beranda/Portofolio.vue';
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';
export default{
  components: {
    Beranda,
    Service,
    Portofolio,
    Blog
  },
  data(){
    return {
        DataHome: [],
        DataLayanan: [],
        DataPortofolio: [],
        DataBlog: []
    }
  },
  async mounted() {
    const response = await Get('http://127.0.0.1:9000/api/home');
    this.DataHome = response.data;
 
    const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
    this.DataLayanan = responseLayanan.data.data;
 
    const responsePortofolio = await Get('http://127.0.0.1:9000/api/portfolio');
    this.DataPortofolio = responsePortofolio.data.data;
 
    const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
    this.DataBlog = responseBlog.data.data;
  },
}
</script>
