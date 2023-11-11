<template>
    <div>
        <beranda :data="DataHome"></beranda>
        <portofolio :data="DataPortfolio"></portofolio>
        <service :data="DataLayanan"></service>
        <blog :data="DataBlog"></blog>
    </div>
</template> 

<script>
import beranda from '@/components/beranda/beranda.vue';
import blog from '@/components/beranda/blog.vue';
import portofolio from '@/components/beranda/portofolio.vue';
import service from '@/components/beranda/service.vue';
import { Get } from '@/api/index.js';

export default {
    components: {
        beranda, 
        portofolio, 
        service, 
        blog,
    },

    data() {
        return {
            DataHome: [],
            DataLayanan: [],
            DataPortfolio: [],
            DataBlog: [],
        }
    },

    async created() {
        //api untuk home
        const response = await Get('http://127.0.0.1:9000/api/home');
        this.DataHome = response.data;
        // api untuk layanan
        const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
        // api untuk portofolio 
        const responsePortfolio = await Get('http://127.0.0.1:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;
        // api untuk blog
        const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    },
}
</script>