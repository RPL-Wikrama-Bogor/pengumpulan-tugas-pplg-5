<template>
    <div class="container">
        <Blog :data="DataBlog">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="Cari Judul">
            </div>
        </Blog>
    </div>
</template>

<script>
import { Get } from '@/Api/index.js'
import Blog from '@/components/beranda/Blog.vue';
export default {
    components: {
        Blog
    },
    data() {
        return {
            DataBlog: []
        }
    },
    async mounted() {
        const response = await Get('blog');
        this.DataBlog = response.data.data;
    }
}
</script>