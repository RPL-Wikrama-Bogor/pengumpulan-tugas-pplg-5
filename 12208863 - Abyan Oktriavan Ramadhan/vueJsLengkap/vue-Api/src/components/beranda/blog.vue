<template>
    <div class="blog blog-section">
        <h3>Blog</h3>
        <div class="row-blog">
            <card v-for="item in data" :blog="item"></card>
        </div>
    </div>
</template>

<script>
import '@/assets/blog.css'
import card from '@/components/blog/card.vue';
export default {
    components : {
        card
    },
    props: ['data']
}
</script>