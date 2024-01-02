<template>
    <Blog :data="DataBlog"></Blog>
</template>

<script>
import blog from '@/components/beranda/blog.vue';
import { Get } from '@/Api/index.js';
export default {
    components: { 
        blog
    },
    data() {
        return {
            DataBlog: []
        }
    },
    async created() {
        const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    }
}

</script>