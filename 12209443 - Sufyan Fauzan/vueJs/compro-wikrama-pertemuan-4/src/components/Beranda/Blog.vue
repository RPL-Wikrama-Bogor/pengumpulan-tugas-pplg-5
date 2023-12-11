<template>
    <div class="blog blog-section">
        <h3>Blog</h3>
        <slot></slot>
        <div class="row-blog">
            <Card v-for="item in data" :blog="item"></Card>
        </div>
    </div>
</template>
<script>
import '@/assets/blog.css';
import Card from '@/components/Blog/Card.vue';
export default {
    components: {
        Card
    },
    props: ['data']
}
</script>