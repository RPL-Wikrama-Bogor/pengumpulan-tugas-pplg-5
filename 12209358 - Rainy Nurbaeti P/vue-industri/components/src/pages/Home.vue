<template>
    <div>
        <Beranda :data="DataHome"></Beranda>
        <Service :data="DataLayanan"></Service>
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
    },
    data() {
        return {
            DataHome: [],
            DataLayanan:[],
        }

    },
    async created(){
        const response = await Get('http://127.0.0.1:9000/api/home') ;
        this.DataHome = response.data ;

        const responseLayanan= await Get('http://127.0.0.1:9000/api/services') ;
        this.DataLayanan = responseLayanan.data.data ;
    },
}
</script>