<template>
    <div>
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    <Portfolio :data="DataPortfolio"></Portfolio>
    <Blog :data="DataBlog"></Blog>
    <Contact :data="DataContact"></Contact>
    </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue';
import Blog from '@/components/Beranda/Blog.vue';
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Service from '@/components/Beranda/Service.vue';
import Contact from '@/components/Beranda/Contact.vue';

import {Get} from '@/api/index.js';
export default{
    components: {
        Beranda, Blog, Portfolio, Service, Contact
    },
    data(){
        return{
            DataHome:[],
            DataLayanan:[],
            DataPortfolio:[],
            DataBlog:[],
            DataContact:[],
        }
    },
    async created() {
        // api untuk home
        const response = await Get('http://localhost:9000/api/home');
        this.DataHome = response.data;
        // api untuk layanan
        const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
        // api untuk Portfolio
        const responsePortfolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;        
        // api untuk Blog
        const responseBlog = await Get('http://localhost:9000/api/blog');
        this.DataBlog = responseBlog.data.data;        
        // api untuk Contact
        const responseContact = await Get('http://localhost:9000/api/contact');
        this.DataContact = responseContact.data.data;        
    },
}
</script>