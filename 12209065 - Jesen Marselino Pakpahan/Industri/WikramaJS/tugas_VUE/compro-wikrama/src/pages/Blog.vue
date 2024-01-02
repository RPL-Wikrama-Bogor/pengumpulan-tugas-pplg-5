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
import { Get } from '../Api';
import Blog from '@/components/Beranda/Blog.vue';
export default{
    components: {
        Blog
    },
    data(){
        return {
            DataBlog: []
        }
    },
    async mounted(){
        const response = await Get('http://127.0.0.1:9000/api/blog');
        this.DataBlog = response.data.data;
    }
}
</script>