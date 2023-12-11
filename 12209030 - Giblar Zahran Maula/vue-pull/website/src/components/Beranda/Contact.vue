<template>
    <div class="blog blog-section">
        <h3> Blog</h3>
        <slot></slot>
        <div class="row-blog">
            <CardBlog v-for="item in data" :blog="item"></CardBlog>
        </div>
    </div>
</template>
<script>
import '@/assets/blog.css'
import CardBlog from '@/components/Blog/Card.vue';
export default {
    components: {
        CardBlog
    },
    props: ['data']
}
</script>