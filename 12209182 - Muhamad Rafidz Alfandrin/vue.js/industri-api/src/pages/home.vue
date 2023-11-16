<template>
        <beranda :data="DataHome"></beranda>
        <service :data="DataLayanan"></service>
</template>

<script>
import beranda from '@/components/beranda/beranda.vue';
import service from '@/components/beranda/service.vue';
import { Get } from '@/api/index.js';
export default {
    components: {
        beranda, 
        service
    },
    data() {
        return {
            DataHome: [],
            DataLayanan: []
        }
    },
    async created() {
        const response = await Get('http://127.0.0.1:9000/api/home');
        this.DataHome = response.data;

        const responseLayanan = await Get('http://127.0.0.1:9000/api/services');
        this.DataLayanan = responseLayanan.data.data;
    },
}
</script>