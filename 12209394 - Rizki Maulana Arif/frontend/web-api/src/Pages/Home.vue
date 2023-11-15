<template>
    <div>
        <Beranda></Beranda>
        <Service></Service>
        <Portofolio></Portofolio>
        <Blog></Blog>
    </div>
</template>

<script>
    import Beranda from '@/components/Beranda/Beranda.vue';
    import Blog from '@/components/Beranda/Blog.vue';
    import Portofolio from '@/components/Beranda/Portofolio.vue';
    import Service from '@/components/Beranda/Service.vue';

    import {Get} from '@/api/index,js';

    export default {
        components: {
            Beranda, Blog, Portofolio, Service, 
},
data() {
    return{
        DataHome:[]
    }
},
mounted(){
    console.log("mounted");
}
    }

</script>