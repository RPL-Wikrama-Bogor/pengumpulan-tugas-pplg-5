<template>
    <div class="container">
        <div class="portofolio">
            <h3>Portofolio kami</h3>
            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
            <div class="category">
                <span v-for="category in DataCategories" @click="filter(category.id)">{{ category.title }}</span>
            </div>
            <div class="row-portofolio">
                <Portfolio :data="DataPortfolio"></Portfolio>
            </div>
        </div>
    </div>
</template>

<script>
import Portfolio from '@/components/Beranda/Portfolio.vue'
import Card from '@/components/Portfolio/Card.vue'
import { Get } from '@/Api/index.js';

export default {
    components: {
        Card,
        Portfolio
    },
    methods: {
        filter(id) {
            Get('http://localhost:9000/api/portfolio?category_id=' + id)
                .then(response => {
                    this.DataPortfolio = response.data.data;
                })
                .catch(error => {
                    console.error(error);
                });
        }
    },
    data() {
        return {
            DataPortfolio: [],
            DataCategories: []
        }
    },
    async created() {
        const responsePortfolio = await Get('http://localhost:9000/api/portfolio');
        this.DataPortfolio = responsePortfolio.data.data;

        const responseCategories = await Get('http://localhost:9000/api/categories');
        this.DataCategories = responseCategories.data;
    }
}
</script>

<style>
.category {
    margin: 10px 0px 35px 0px;
    display: flex;
    flex-wrap: wrap;
}
.category span {
    background-color: #bdcdff;
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}
.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 5px;
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
    color: #042181;
}
.portofolio p {
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: #7087dc;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
    text-align: center;
}
.portofolio p span {
    color: rgb(145, 88, 88);
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
}
</style>
