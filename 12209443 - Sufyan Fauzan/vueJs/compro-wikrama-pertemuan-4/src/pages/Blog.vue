<template>
  <div class="container">
    <Blog :data="filteredDataBlog">
      <div class="search">
        <input type="text" class="searchTerm" placeholder="Cari Judul" v-model="searchTerm">
      </div>
      <div class="row-blog" v-if="filteredDataBlog.length === 0">  
          <h1>Tidak ada hasil yang ditemukan.</h1>
      </div>
    </Blog>
  </div>
</template>

<script>
import { Get } from "@/Api/index.js";
import Blog from "@/components/Beranda/Blog.vue";

export default {
  components: {
    Blog,
  },
  data() {
    return {
      DataBlog: [],
      searchTerm: '', // Data untuk menyimpan teks pencarian
    }
  },
  async mounted() {
    const responseBlog = await Get('blog');
    this.DataBlog = responseBlog.data.data;
  },
  computed: {
    filteredDataBlog() {
      return this.DataBlog.filter((blog) => {
        return blog.title.toLowerCase().includes(this.searchTerm.toLowerCase());
      });
    },
  },
}
</script>
