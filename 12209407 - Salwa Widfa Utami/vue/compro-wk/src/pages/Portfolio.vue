<template>
    <div class="container">
        <div class="portofolio">
            <h4>Portofolio kami</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis nostrum vero officia beatae.</p>
           {{ DataCategories }}
            <div class="category">
                <span v-for="category in DataCategories" @click="filter (category.id)">{{ category.title}}</span>
                </div>
                
            
            <div class="row-portofolio">
                <!-- <CardPortfolio></CardPortfolio> -->
                <Card v-for="item in DataPortfolio" :portfolio="item"></Card>
            </div>
        </div>
    </div>
</template>

<script>
import Card  from '@/components/Portfolio/CardPortfolio.vue';
import {Get} from '@/api/index.js'; 
export default{
    components: {
      Card
    },
    methods:{
        async filter(id){
            const response = await
            Get('http://localhost:9000/api/portfolio?category_id=' + id);
            this.DataPortfolio = response.data.data;
            
        }
    },
    data(){
        return{
            DataPortfolio:[],
            DataCategories:[]
        }
    },
    async created() {
        // api untuk Portfolio
        const response = await
         Get('http://localhost:9000/api/portfolio');
       this.DataPortfolio = response.data.data;
       
        const responseCategories = await Get('http://localhost:9000/api/categories');
        this.DataCategories = responseCategories.data;
    

           

    }
}
</script>

<style>
.category{
    margin: 10px 0 35px 0;
    display: flex;
    flex-wrap: wrap;
}

.category span{
    background-color: aliceblue;
    padding: 10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.row-portofolio{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

.portofolio {
    margin-top: 80px;
}

.portofolio h4 {
    margin: 10px;
    font-weight: 900;
    font-size: 30px;
    line-height: 35px;
    color: darkblue;
    margin-bottom: 0;
    text-align: center;
}

.portofolio p {
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: gray;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    text-align: center;
}

.portofolio p span{
    color: darkgray;
}

@media screen and (max-width: 600px) {
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
    .portofolio h4{
        font-size: 20px;
    }
}
</style>