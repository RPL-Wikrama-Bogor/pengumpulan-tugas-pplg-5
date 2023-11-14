<template>
    <div>
        <Blog :data="DataBlog"></Blog>
    </div>
</template>
<script>
import Blog from '@/components/Beranda/Blog.vue';
import { Get } from '@/Api/index.js';

export default {
    components: {
        Blog,
    },
    data() {
        return {
            DataBlog: []
        }
    },
    async created() {
        const responseBlog = await Get('http://localhost:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    },
}
</script>