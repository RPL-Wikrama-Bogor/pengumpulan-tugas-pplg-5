<template>
    <div>
        <Beranda :data="DataHome"></Beranda>
        <Service :data="DataLayanan"></Service>
        <Portofolio :data="DataPortfolio"></Portofolio>
        <Blog :data="DataBlog"></Blog>
    </div>
</template>

<script>
import Beranda from '@/components/beranda/Beranda.vue'
import Portofolio from '@/components/beranda/Portofolio.vue'
import Blog from '@/components/beranda/blog.vue'
import Service from '@/components/beranda/Service.vue'

import { Get } from '@/Api/index.js';
export default {
    components: {
        Beranda,
        Service,
        Portofolio,
        Blog
        
    },
    data() {
        return {
            DataHome: [],
            DataLayanan: [],
            DataPortfolio: [],
            DataBlog: []
        }
    },
    async created() {
        const response = await Get('home');
        this.DataHome = response.data;
        const responseLayanan = await Get('services')
        this.DataLayanan = responseLayanan.data.data;
        const responsePortfolio = await Get('portfolio')
        this.DataPortfolio = responsePortfolio.data.data;
        const responseBlog = await Get('blog')
        this.DataBlog = responseBlog.data.data;
    }
}
</script>