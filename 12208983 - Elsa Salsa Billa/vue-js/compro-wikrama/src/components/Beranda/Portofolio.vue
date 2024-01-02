<template>
    <div class="portofolio">
        <!-- <h3>Portofolio Kami</h3>
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi mollitia laboriosam nemo facilis, molestiae quo
            placeat tempore a nostrum!</p> -->
        <div class="row-portofolio">
            <Card v-for="item in data" :portofolio="item"></Card>
        </div>
    </div>
</template>

<script>
import Card from '@/components/Portofolio/Card.vue';
export default {
    components: {
        Card
    },
    props:['data']
}
</script>

<style>
    .portofolio {
        margin-top: 80px;
    }
    .portofolio h3 {
        margin: auto;
        font-family: 'Raleway', sans-serif;
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
        color: #4f556A;
        max-width: 680px;
        margin: auto;
        margin-top: 14px;
        margin-bottom: 25px;
    }
    .portofolio p span {
        color: gray;
    }
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 10px;
    }

    @media screen and (max-width: 600) {
        .row-portofolio {
            display: grid;
            grid-template-columns: repeat(1, 1fr);
            grid-gap: 10px;
        }
    }

</style>