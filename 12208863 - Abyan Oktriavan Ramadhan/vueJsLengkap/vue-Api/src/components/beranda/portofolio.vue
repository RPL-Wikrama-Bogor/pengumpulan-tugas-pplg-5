<template>
    <div>
        <div class="portofolio">
            <h3>Portofolio</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Numquam illum ullam optio.</p>
            <div class="row-portofolio">
                <card v-for="item in data" :portfolio="item"></card>
            </div>
        </div>
    </div>
</template>

<script>
import card from '@/components/portofolio/card.vue'
export default {
    components: {
        card
    },
    props: ['data']
}
</script>

<style>
.portofolio{
    margin-top: 80px;
}

.portofolio h3{
    margin: auto;
    font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
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
    color: #4F556A;
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
}

.portofolio p span{
    color: gray;
}

.row-portofolio{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px;
}

@media screen and (max-width: 600px){
    .row-portofolio {
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px;
    }
}
</style>