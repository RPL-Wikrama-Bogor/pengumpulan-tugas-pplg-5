<template>
    <div class="container">
        <div class="portofolio">
            <h3>Portofolio Kami</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero eius odit quas exercitationem asperiores
                nisi beatae debitis delectus id ut commodi maxime error nulla, perspiciatis autem quo velit, harum cum.</p>
            <div class="category">
                <span v-for="category in DataCategories" @click="filter(category.id)">{{ category.title }}</span>
            </div>
            <div class="row-portofolio">

            </div>
            <Portofolio :data="DataPortofolio"></Portofolio>
        </div>
    </div>
</template>
<script>
import Portofolio from '@/components/Beranda/Portofolio.vue';
import { Get } from '@/Api/index.js';

export default {
    components: {
        Portofolio,
    },
    methods:{
        async filter(id) {
            const response = await
            Get('http://localhost:9000/api/portfolio?category_id=' + id);
            this.DataPortofolio = response.data.data;
        }
    },
    data() {
        return {
            DataPortofolio: [],
            DataCategories: []
        }
    },
    async created() {
        const responsePortofolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortofolio = responsePortofolio.data.data;
        const responseCategories = await Get('http://localhost:9000/api/categories');
        this.DataCategories = responseCategories.data;
    },
}
</script>
<style scoped>
.category {
    margin: 10px 0 35px 0;
    display: flex;
    flex-wrap: wrap;
}

.category span {
    background-color: rgb(166, 183, 207);
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

.portofolio {
    margin-top: 10px;
}

.portofolio h3 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    margin-bottom: 0;
    color: rgb(88, 88, 159);
}

.portofolio p {
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: #4f5564;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
    text-align: center;
}

.portofolio p span {
    color: gray;
}

@media screen and (max-width: 600px) {
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }

    .portofolio h3 {
        font-size: 20px;
    }
}</style>