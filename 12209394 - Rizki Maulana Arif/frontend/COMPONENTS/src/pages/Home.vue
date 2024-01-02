<template>

<div class="container">
    <Beranda></Beranda>
    <Service></Service>
    <Portfolio></Portfolio>
    <Blog></Blog>
  </div>
</template>
<script>
import Navbar from '@/components/Layouts/Navbar.vue';
import Beranda from '@/components/Beranda/Beranda.vue';
import Service from '@/components/Beranda/Service.vue'
import Portfolio from '@/components/Beranda/Portfolio.vue';
import Blog from '@/components/Beranda/Blog.vue';
export default {
  components: {
    Navbar,
    Beranda,
    Service,
    Portfolio,
    Blog
  }
}</script>