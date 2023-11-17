<template>
  <div class="portofolio">
    <div class="row-portofolio">
        <CardPortfolio v-for="item in data" :portfolio="item" :key="item.id"></CardPortfolio>
    </div>
  </div>
</template>

<script>

import CardPortfolio from '@/components/portofolio/CardPortfolio.vue';

export default {
    components: {
        CardPortfolio
    },
    props : ['data']
}

</script>

<style>

.portofolio {
    margin-top: 80px;
}

.portofolio h3 {
    margin : auto;
    font-family : 'Raleway', sans-serif;
    font-weight: 900;
    font-size: 48px;
    line-height: 70px;
    color: #042181;
    margin-bottom: 15px;
    text-align: center;
}

.portofolio p {
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: #4f556a;
    max-width: 650px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
}

.portofolio p span {
    color: grey;
}

.row-portofolio {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

@media screen and (max-with : 600px) {
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(1, 1fr );
        grid-gap: 10px;
    }    
}
</style>
