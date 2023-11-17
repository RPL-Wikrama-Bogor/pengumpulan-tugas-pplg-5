<template>
    <div class="portofolio">
        <h3>Portofolio Kami</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi mollitia laboriosam nemo facilis, molestiae quo
            placeat tempore a nostrum, libero, illo accusantium ducimus inventore sunt et ipsam illum voluptatum
            perspiciatis!</p>
            
        <div class="row-portofolio">
            <CardPortfolio v-for="item in data" :portfolio="item"></CardPortfolio>
        </div>
    </div>
</template>

<script>
import CardPortfolio from '@/components/Portfolio/CardPortfolio.vue';
export default {
    components: {
        CardPortfolio
    },
    props: ['data']
}
</script>

<style scope>
.category{
    margin: 1px 0 35px 0;
    display: flex;
    flex-wrap: wrap;

}
.category span{
    background-color: #bdcdff;
    padding:10px 15px;
    font-weight: 500;
    border-radius: 20px;
    margin: 5px;
    cursor: pointer;
}

.portofolio {
    margin-top: 80px;
}

.portofolio h3 {
    margin: 10px;
    font-family: 'Raleway', sans-serif;
    font-weight: 900;
    font-size: 48px;
    line-height: 70px;
    color: darkblue;
    margin-bottom: 15px;
    text-align: center;
}

.portofolio p span {
    color: gray;
}

.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

@media screen and (max-width: 600px) {
    .row-service {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}
</style>