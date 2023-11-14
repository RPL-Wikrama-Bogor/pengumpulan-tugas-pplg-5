<template>
    <div class="container">
        <div class="portofolio">
            <h3>Portofolio Kami</h3>
            <p>cause if you think im such a happy person? no you all wrong ,by saying my laugher and louder than your , shut your freaking mouth, no one know's what i feel and what i suffer, no, they dont know, so keep you thought and stop assuming that someone that always smile</p>
            
            <div class="category">
                <span v-for="category in DataCategories" @click="filter(category.id)">{{ category.title }}</span>
            
            </div>
            <div class="row-portofolio">
                <Card v-for="item in DataPortfolio" :portfolio="item"></Card>
               
            </div>
        </div>
    </div>
    
</template>
<script>
import Card from '@/components/Portfolio/Card.vue';
import { Get } from '@/Api/index.js';
export default{
    components: {
        Card,
    },
    methods:{
        async filter(id){
            
            const response = await
            Get(`portfolio?category_id=${id}`);
            this.DataPortfolio = response.data.data;
        }
    },

    data(){
        return{
            DataPortfolio:[],
            DataCategories:[]
        }
    },

    async mounted(){
        const responsePortfolio = await Get('portfolio');
    this.DataPortfolio = responsePortfolio.data.data;
            const responseCategories = await Get ('categories');
            this.DataCategories = responseCategories.data;
        }
}

</script>
<style>

.category {
    margin: 10px 0 35px 0;
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
    grid-gap: 10px;
}
.portofolio {
    margin-top: 10px;
}
.portofolio h3 {
    margin-top: 10px;
    font-weight: 900;
    font-size: 30px;
    margin-bottom: 0;
    color: #042181;
}
.portofolio p {
    font-weight: 600;
    font-size: 14px;
    line-height: 20px;
    color: #4F556A;
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
    .row-portofolio h4 {
        font-size: 20px;
    }
}
</style>