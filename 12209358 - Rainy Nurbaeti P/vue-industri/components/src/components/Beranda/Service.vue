<template>
    <div class="service">
        <h3>Layanan Kami</h3>
        <div class="row-service">
            <Card v-for="item in data" :layanan="item"></Card>
        </div>
    </div>
</template>
<script>
import Card from '@/components/Service/Card.vue' ;
export default{
    components: {
        Card
    },
    props: ['data']
}
</script>
<style>
.service{
    margin-top: 10px;
}
.service h3{
    margin-top: 5rem;
    font-weight: 900;
    font-size: 48px;
    line-height: 35px;
    color: rgb(25, 31, 35);
    text-align: center;
}
.row-service{
    display: grid;
    grid-template-columns: repeat(3 , 1fr);
    grid-gap: 10px ;
}
@media screen and (max-width: 600px) {
    .row-service{
        display: grid;
        grid-template-columns: repeat(1, 1fr);
        grid-gap: 10px ;
    }

}
</style>
