<template>
    
    <div class="container">
     <Beranda :data="DataHome"></Beranda>
     <Service :data="DataLayanan"></Service>
   <Portfolio :data="DataPortfolio"></Portfolio>
   <Blog  :data="DataBlog"></Blog>
    </div>
   </template>
   <script>

   import Beranda from '@/components/Beranda/Beranda.vue';
   import Service from '@/components/Beranda/Service.vue';
   import Portfolio from '@/components/Beranda/Portofolio.vue';
   import Blog from '@/components/Beranda/Blog.vue';
   import { Get } from '../Api';
   export default {
     components: {
       Beranda,
       Service,
       Portfolio,
       Blog
   },
   data() {
    return{
        DataHome: [],
        DataLayanan:[],
        DataPortfolio:[],
        DataBlog: [],
    }
   },
   async created() {
    const response = await Get('http://127.0.0.1:9000/api/home');
    this.DataHome = response.data;

    const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
    this.DataLayanan = responseLayanan.data.data;

    const responsePorfolio = await Get('http://127.0.0.1:9000/api/portfolio');
    this.DataPortfolio = responsePorfolio.data.data;
    console.log(responsePorfolio.data.data);

    const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
    this.DataBlog = responseBlog.data.data;
   },
   }
   </script>
   
   