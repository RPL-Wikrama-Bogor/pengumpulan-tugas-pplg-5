<template>
    <div class="portofolio">
        <div class="row-portofolio">
            <Card v-for="item in data" :portfolio="item"></Card>
        </div>
    </div>
</template>
<script>
import Card from '@/components/Portfolio/Card.vue' ;
export default {
    components: {
        Card
    },
    props:['data']
}
</script>
<style scope>
.portofolio{
    margin-top: 80px;
}
.portofolio h3{
    margin: auto;
    font-family: 'Raleway', sans-serif;
    font-weight: 900;
    font-size: 48px;
    line-height: 70px;
    color: #064cef;
    margin-bottom: 15px;
    text-align: center;
}
.portofolio p{
    font-weight: 900;
    font-size: 14px;
    line-height: 20px;
    color: rgb(69, 16, 192);
    max-width: 680px;
    margin: auto;
    margin-top: 14px;
    margin-bottom: 25px;
}
.portofolio p span{
    color: black ;
}

.row-portofolio{
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-gap: 10px ;
}

@media screen and (max-width: 600px) {
    .row-portofolio{
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px ;
    }
}
</style>