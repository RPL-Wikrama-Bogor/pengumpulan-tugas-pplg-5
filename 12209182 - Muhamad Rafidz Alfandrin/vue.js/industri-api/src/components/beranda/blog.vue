<template>
    <div class="blog blog-section">
        <h3>Blog</h3>
        
        <div class="row-blog">
            <cardBlog v-for="item in data" :blog="item"></cardBlog>
        </div>
    </div>
</template>

<script>
import '@/assets/blog.css';
import cardBlog from '@/components/blog/cardBlog.vue';
export default {
    components: {
        cardBlog
    },
    props: ['data']
}
</script>

<style>
.row-blog {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap: 10px;
}

@media screen and (max-width: 600px) {
    .row-blog {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}
</style>