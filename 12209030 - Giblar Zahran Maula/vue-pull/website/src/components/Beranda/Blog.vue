<template>
    <div class="blog blog-section">
        <h3>Blog</h3>
        <div class="search">
            <input type="text" class="searchTerm" placeholder="Cari judul" @keyup="handleSearch">
        </div>
        <div class="row-blog">
            <Card v-for="item in filteredData" :blog="item" :key="item.id"></Card>
        </div>
    </div>
</template>
<script>
import '@/assets/blog.css' 
import Card from '@/components/Blog/Card.vue';

export default {
    components: {
        Card
    },
    props: ['data'],
    data() {
        return {
            searchTerm: ''
        }
    },
    computed: {
        filteredData() {
            if (this.searchTerm === '') {
                return this.data;
            } else {
                const searchTermLowerCase = this.searchTerm.toLowerCase();
                return this.data.filter(blog => blog.title.toLowerCase().includes(searchTermLowerCase));
            }
        }
    },
    methods: {
        handleSearch(event) {
            this.searchTerm = event.target.value;
        }
    }
}
</script>