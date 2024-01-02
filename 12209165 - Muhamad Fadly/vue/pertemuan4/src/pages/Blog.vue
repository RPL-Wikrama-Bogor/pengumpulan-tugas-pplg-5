
<template>
    <div class="container">
        <Blog :data="filteredDataBlog">
            <div class="search">
                <input type="text" class="searchTerm" placeholder="cari judul" v-model="searchTerm">
            </div>
        </Blog>
    </div>
</template>



<script>
import Blog from '@/components/beranda/Blog.vue';
import { Get } from '@/Api/index.js';
export default {
    components: {
        Blog
    },
    data() {
        return {
            DataBlog: [],
            searchTerm:''
        }
    },
    computed: {
        filteredDataBlog() {
            const searchTerm = this.searchTerm.toLowerCase();
            return this.DataBlog.filter(blog => blog.title.toLowerCase().includes(searchTerm));
        }
    },
    async created() {
        const responseBlog = await Get('http://127.0.0.1:9000/api/blog');
        this.DataBlog = responseBlog.data.data;
    },


}

</script>
