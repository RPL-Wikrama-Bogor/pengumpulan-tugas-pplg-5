<template>
<navbar></navbar>
<div class="container">
<router-view></router-view>
</div>
</template>

<script>
import navbar from '@/components/layouts/navbar.vue'; 
export default {
  components: {
    navbar,
  },
};
</script>