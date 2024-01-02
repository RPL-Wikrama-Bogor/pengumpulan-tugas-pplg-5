<template>
    <div>
        <service :data="DataLayanan"></service>
    </div>
</template>

<script>
import Service from '@/components/Beranda/Service.vue';

import { Get } from '@/Api/index.js' ;
export default{
    components: {
        Service,
    },
    data() {
        return {
           DataLayanan: []
        }
    },
    async created(){
        const responseLayanan= await Get('http://127.0.0.1:9000/api/services') ;
        this.DataLayanan = responseLayanan.data.data ;
    },
}
</script>