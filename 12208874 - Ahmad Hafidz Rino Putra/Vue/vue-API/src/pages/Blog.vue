<template>
  <div class="container">
    <Blog :data="DataBlog">
      <div class="search">
        <input
          type="text"
          class="searchTerm"
          placeholder="Cari Judul"
          v-model="searchTerm"
        />
        <button @click="search">Cari</button>
      </div>
    </Blog>
  </div>
</template>

<script>
import Blog from "@/components/beranda/Blog.vue";
import { Get } from "@/api/index.js";

export default {
  components: {
    Blog,
  },
  data() {
    return {
      DataBlog: [],
      searchTerm: "",
    };
  },

  async mounted() {
    await this.fetchData();
  },

  methods: {
    async fetchData() {
      const responseBlog = await Get("blog");
      this.DataBlog = responseBlog.data.data;
    },

    search() {
      const searchTerm = this.searchTerm.toLowerCase();

      const filteredData = this.DataBlog.filter((blog) =>
        blog.title.toLowerCase().includes(searchTerm)
      );

      this.DataBlog = filteredData;
    },
  },
};
</script>

<style scoped>
.search {
    display: flex;
    align-items: center;
    height: 60px; 
  }
  
  .searchTerm {
    margin-right: 8px;
    flex: 1; 
  }
  
</style>
