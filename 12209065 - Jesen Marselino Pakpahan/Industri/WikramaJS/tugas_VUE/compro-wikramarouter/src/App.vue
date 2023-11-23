<template>
  <Navbar></Navbar>
  <div class="container">
    <router-view></router-view>
  </div>
</template>
<script>
import Navbar from './components/Layouts/Navbar.vue'
import Beranda from './components/Beranda/Beranda.vue'
import Service from './components/Beranda/Service.vue'
import Portofolio from './components/Beranda/Portofolio.vue'
import Blog from './components/Beranda/Blog.vue'
export default{
  components: {
    Navbar,
    Beranda,
    Service,
    Portofolio,
    Blog
  }
}</script>
