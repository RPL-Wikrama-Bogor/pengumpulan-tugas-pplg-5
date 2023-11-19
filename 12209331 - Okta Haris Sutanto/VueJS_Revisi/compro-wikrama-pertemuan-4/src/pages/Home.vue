<template>
  <div class="container">
    <Beranda :data="DataHome"></Beranda>
    <Service :data="DataLayanan"></Service>
    <Portfolio :data="DataPortfolio"></Portfolio>
    <Blog :data="DataBlog"></Blog>
  </div>
</template>
<script>
import Navbar from "@/components/Layouts/Navbar.vue";
import Beranda from "@/components/Beranda/Beranda.vue";
import Service from "@/components/Beranda/Service.vue";
import Portfolio from "@/components/Beranda/Portfolio.vue";
import Blog from "@/components/Beranda/Blog.vue";
import { Get } from "@/Api/index.js";

export default {
  components: {
    Navbar,
    Beranda,
    Service,
    Portfolio,
    Blog
  },
  data() {
    return {
      DataHome: [],
      DataLayanan: [],
      DataPortfolio: [],
      DataBlog: []
    };
  },
  async created() {
    try {
      const response = await Get("home");
      this.DataHome = response.data.data;

      const responseLayanan = await Get("services");
      this.DataLayanan = responseLayanan.data.data;

      const responsePortfolio = await Get("portfolio");
      this.DataPortfolio = responsePortfolio.data.data;

      const responseBlog = await Get("blog");
      this.DataBlog = responseBlog.data.data;
    } catch (error) {
      console.error("Error fetching data:", error);
    }
  },
};
</script>
