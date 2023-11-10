<template>
    <div>
    <Blog :data="DataContact"></Blog>
    </div>
</template>

<script>
import Contact from '@/components/Beranda/Contact.vue';

import {Get} from '@/api/index.js';
export default{
    components: {
        Contact,
    },
    data(){
        return{
            DataContact:[],
        }
    },
    async created() {
        const responseContact = await Get('http://localhost:9000/api/contact');
        this.DataContact = responseContact.data.data;        
    },
}
</script>

<style>

</style>