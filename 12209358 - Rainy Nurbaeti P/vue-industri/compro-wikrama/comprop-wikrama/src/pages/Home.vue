<template>
    <div>
        <Beranda :data="DataHome"></Beranda>
        <Service></Service>
        <!-- <Portfolio></Portfolio>
        <Blog></Blog> -->
    </div>
</template>

<script>
import Beranda from '@/components/Beranda/Beranda.vue'
// import Blog from '@/components/Beranda/Blog.vue'
// import Portfolio from '@/components/Beranda/Portfolio.vue'
import Service from '@/components/Beranda/Service.vue'

import { Get } from '@/Api/index.js' ;
export default{
    components: {
        Beranda,
        Service,
        // Portfolio,
        // Blog,
    },
    data() {
        return {
            DataHome: []
        }
    },
    async mounted(){
        const response = await Get('http://127.0.0.1:9000/api/home') ;
        this.DataHome = response.data ;
    },
}
</script>